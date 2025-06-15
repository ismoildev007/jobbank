<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\PaymeTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\TransactionResource;
use Illuminate\Support\Facades\Log;

class PaymeController extends Controller
{

    public $TEST_KEY = 'Paycom:&hHvMM%3mJHcXZSiPqk@oRvHWY7YA%Pp5K9a';

    public function checkAuth($request)
    {
        $authHeader = $request->header('Authorization');
        if ($authHeader && preg_match('/^Basic\s+(.*)$/i', $authHeader, $matches)) {
            $decoded = base64_decode($matches[1]);
            if ($decoded == $this->TEST_KEY) {
                return true;
            }

        }
        return false;
    }

    public function handleCallback(Request $request)
    {

        $check = $this->checkAuth($request);
        if (!$check){
            return response()->json([
                'error' => [
                    'code' => -32504,
                    'message' => 'Недостаточно привилегий для выполнения метода'
                ]
            ], 200);
        }


        $method = $request->method;

        return match ($method) {
            "CheckPerformTransaction" => $this->checkPerformTransaction($request),
            "CreateTransaction" => $this->createTransaction($request),
            "CheckTransaction" => $this->checkTransaction($request),
            "PerformTransaction" => $this->performTransaction($request),
            "CancelTransaction" => $this->cancelTransaction($request),
            "GetStatement" => $this->getStatement($request),
            "ChangePassword" => $this->changePassword($request),
            default => $this->error($request->id, -32601, "Method not found."),
        };
    }

    protected function checkPerformTransaction(Request $request)
    {

        $params = $request->params;
        if (!isset($params['account']['phone_number'])) {
            return $this->notParam();
        }
        $pay_id = $request['params']['id'] ?? null;
        $prepare_id = $params['account']['phone_number'] ?? null;
        if ($prepare_id) {
            $prepare = PaymeTransaction::where('id', $prepare_id)->first();
            if (!$prepare) {
                return $this->OrderNotFound($pay_id);
            }
        }

        if ($pay_id) {
            $prepare = PaymeTransaction::where('transaction_id', $pay_id)->first();
            if (!$prepare) {
                return $this->pending();
            }
        }

        if (!isset($prepare)) return $this->OrderNotFound($pay_id);

        if (($params['amount']) != ($prepare->amount*100)) {
            return $this->notCorrectAmount();
        }

        if ($prepare->payment_status == 1) {
            return $this->OrderNotFound($pay_id);
        }

        if ($prepare->state == -2) return $this->canceled($prepare);

        $prepare->create_time = null;
        $prepare->transaction_id = null;
        $prepare->perform_time = 0;
        $prepare->cancel_time = 0;
        $prepare->state = null;
        $prepare->reason = null;
        $prepare->save();

        return response()->json([
            'result' => [
                'allow' => true
            ]
        ]);
    }

    public function createTransaction(Request $request)
    {
        $param = $request->all();
        $time = floor(microtime(true) * 1000);
        $transaction_id = $param['params']['id'] ?? null;
        $prepare_id = $param['params']['account']['phone_number'] ?? null;
        if ($prepare_id) {
            $prepare = PaymeTransaction::where('id', $prepare_id)->first();
            if (($param['params']['amount']) != ($prepare->amount*100)) return $this->notCorrectAmount();
            if ($prepare->state == 1 && $prepare->transaction_id != $transaction_id) {
                return self::pending();
            }
            if ($prepare->state == 1) {
                return [
                    'result' => [
                        'create_time' => $prepare->create_time,
                        'transaction' => (string)$prepare->id,
                        'state' => 1,
                    ]
                ];
            }
            if ($prepare->payment_status == 1) {
                return $this->OrderNotFound($prepare_id);
            }
            if ($prepare->state == -2) return $this->canceled($prepare);
            if (!$prepare) return $this->OrderNotFound(0);
            $prepare->create_time = $time;
            $prepare->transaction_id = $param['params']['id'];
            $prepare->state = 1;
            $prepare->save();
            return response()->json([
                'result' => [
                    'create_time' => $prepare->create_time,
                    'transaction' => (string)$prepare->id,
                    'state' => 1,
                ]
            ]);
        }
        return self::notParam();
    }

    public function checkTransaction($param)
    {
        $transaction_id = $param['params']['id'] ?? null;

        $order = PaymeTransaction::where('transaction_id', $transaction_id)->first();
        if ($order) {
            if ($order->state == -2) return self::canceled($order);
            return [
                'result' => [
                    'create_time' => $order->create_time,
                    'perform_time' => $order->perform_time,
                    'cancel_time' => $order->cancel_time,
                    'transaction' => (string)$order->id,
                    'state' => $order->state,
                    'reason' => $order->reason,
                ]
            ];
        }

        return $this->OrderNotFound(0);
    }

    public function performTransaction($param)
    {
        $prepare = PaymeTransaction::where(['transaction_id' => $param['params']['id'] ?? 0])->first();
        if (!$prepare) {
            return $this->OrderNotFound($param['params']['id']??0);
        }
        if ($prepare->state == -2) return $this->canceled($prepare);

        $order = Booking::where('id', $prepare->booking_id);
        if (!$prepare->perform_time) {
            $time = floor(microtime(true) * 1000);
            $prepare->perform_time = $time;
            $prepare->state = 2;
            $prepare->payment_status = 1;
            $prepare->save();
        }

        if ($prepare->state == 2) {
            $order->update([
                'status' => 'payed',
                'payment_type' => 'Payme'
            ]);
            Transaction::create([
                'booking_id' => $prepare->booking_id,
                'transaction_id' => $prepare->transaction_id,
                'state' => $prepare->state,
                'payment_status' => $prepare->payment_status,
                'amount' => $prepare->amount,
                'create_time' => $prepare->create_time,
                'perform_time' => $prepare->perform_time,
                'cancel_time' => $prepare->cancel_time,
                'reason' => $prepare->reason,
            ]);
        }

        return response()->json([
            'result' => [
                'perform_time' => $prepare->perform_time,
                'transaction' => (string)$prepare->id,
                'state' => $prepare->state,
            ]
        ]);
    }

    public function cancelTransaction($param)
    {
        $transaction_id = $param['params']['id'] ?? null;
        $time = floor(microtime(true) * 1000);
        $order = PaymeTransaction::where('transaction_id', $transaction_id)->first();
        if ($order) {
            if (!$order->cancel_time){
                if ($order->payment_status == 0){
                    $order->state = -1;
                }else{
                    $order->state = -2;
                }
                $order->cancel_time = $time;
                $order->reason = $param['params']['reason'];
                $order->save();
            }
            return [
                'result' => [
                    'transaction' => (string)$order->id,
                    'state' => $order->state,
                    'cancel_time' => $order->cancel_time,
                ]
            ];
        }

        return $this->OrderNotFound($transaction_id);
    }

    protected function getStatement(Request $request)
    {
        $from = $request->params['from'] ?? null;
        $to = $request->params['to'] ?? null;

        if (!$from || !$to || !is_numeric($from) || !is_numeric($to)) {
            return $this->error($request->id, -31050, [
                'uz' => "Vaqtlar noto‘g‘ri formatda",
                'ru' => "Неверный формат времени",
                'en' => "Invalid time format"
            ]);
        }

        $transactions = PaymeTransaction::getTransactionsByTimeRange($from, $to);

        return $this->success([
            'transactions' => TransactionResource::collection($transactions),
        ]);
    }

    protected function changePassword(Request $request)
    {
        return $this->error($request->id, -32504, [
            "uz" => "Metodni bajarish uchun yetarli huquqlar yo'q",
            "ru" => "Недостаточно привилегий для выполнения метода",
            "en" => "Not enough privileges to perform this method"
        ]);
    }

    protected function success(array $result)
    {
        return response()->json([
            'jsonrpc' => '2.0',
            'id' => request()->id ?? null,
            'result' => $result,
        ]);
    }

    protected function error($id, $code, $message)
    {
        return response()->json([
            'jsonrpc' => '2.0',
            'id' => $id,
            'error' => [
                'code' => $code,
                'message' => is_array($message) ? $message : [
                    'uz' => $message,
                    'ru' => $message,
                    'en' => $message,
                ],
            ]
        ], 200);
    }

    protected function incorrectAmount($id)
    {
        return response()->json([
            'id' => $id,
            'error' => [
                'code' => -31001,
                'message' => [
                    "uz" => "Noto‘g‘ri summa",
                    "ru" => "Неверная сумма",
                    "en" => "Incorrect amount"
                ]
            ]
        ]);
    }

    protected function OrderNotFound($id)
    {
        return response()->json([
            'error' => [
                'code' => -31050,
                'message' => [
                    'uz' => 'Buyurtma topilmadi',
                    'ru' => 'Заказ не найден',
                    'en' => 'Order not found'
                ]
            ]
        ]);
    }

    protected function notParam()
    {
        return response()->json([
            'error' => [
                'code' => -31050,
                'message' => [
                    'ru' => 'Ошибки неверного ввода данных покупателем',
                    'uz' => 'Xaridor tomonidan noto`g`ri ma`lumotlarni kiritish xatolari',
                    'en' => 'Errors of incorrect data entry by the buyer',
                ]
            ]
        ]);
    }

    protected function notCorrectAmount()
    {
        return response()->json([
            'error' => [
                'code' => -31001,
                'message' => [
                    'ru' => 'Неверная сумма',
                    'uz' => 'Yaroqsiz miqdor',
                    'en' => 'Incorrect amount',
                ]
            ]
        ]);
    }

    protected function canceled($order)
    {
        return response()->json([
            'result' => [
                'transaction' => (string)$order->id,
                'state' => $order->state,
                'cancel_time' => $order->cancel_time,
                'create_time' => $order->create_time,
                'perform_time' => $order->perform_time,
                'reason' => $order->reason,
            ]
        ]);
    }

    protected function pending()
    {
        return response()->json([
            'error' => [
                'code' => -31050,
                'message' => [
                    'ru' => 'В ожидании оплаты',
                    'uz' => 'To`lov kutilmoqda',
                    'en' => 'Waiting for payment',
                ]
            ]
        ]);
    }
}
