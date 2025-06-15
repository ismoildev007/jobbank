<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PaymeTransaction;
use App\Models\Sub;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubController extends Controller
{
    public function index()
    {
        $subs = Sub::all();
        return view('admin.subscription.pricing', compact('subs'));
    }

    public function allSubscriptions()
    {
        $subscriptions = Subscription::whereHas('provider', function ($query) {
            $query->where('role', '1');
        })
            ->with(['provider', 'sub'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.subscription.all_subscriptions', compact('subscriptions'));
    }

    public function subscribe(Request $request, $subId)
    {
        $user = Auth::user();
        $sub = Sub::findOrFail($subId);

        if ($sub->price > 0) {
            // Pullik reja uchun to‘lov jarayoniga o‘tish
            $booking = Booking::create([
                'user_id' => $user->id,
                'price' => $sub->price,
                'sub_id' => $sub->id,
            ]);

            $paymeTransaction = PaymeTransaction::create([
                'booking_id' => $booking->id,
                'transaction_id' => null,
                'amount' => $sub->price,
                'state' => 0,
                'payment_status' => 'pending',
                'create_time' => null
            ]);

            return redirect()->route('payment.bron.show', ['booking' => $booking->id]);
        }

        if ($sub->price == 0) { // Bepul reja (Basic)
            $hasUsedFreePlan = Subscription::where('provider_id', $user->id)
                ->where('sub_id', $sub->id)
                ->exists();

            if ($hasUsedFreePlan) {
                return redirect()->back()->with('error', 'Siz bepul rejani umringiz davomida faqat bir marta ishlatishingiz mumkin!');
            }
        }

        if ($sub->name_en === 'Standard') {
            $hasUsedStandard = Subscription::where('provider_id', $user->id)
                ->where('sub_id', $sub->id)
                ->exists();

            if ($hasUsedStandard) {
                return redirect()->back()->with('error', 'Siz Standard rejani umringiz davomida faqat bir marta ishlatishingiz mumkin!');
            }
        }

        $currentSubscription = Subscription::where('provider_id', $user->id)
            ->where('end_date', '>=', now())
            ->first();

        if ($currentSubscription && $currentSubscription->sub_id == $subId) {
            return redirect()->back()->with('error', 'Siz allaqachon ushbu rejaga obuna bo‘lgansiz!');
        }

        $booking = Booking::create([
            'user_id' => $user->id,
            'price' => $sub->price,
            'sub_id' => $sub->id,
        ]);

        $paymeTransaction = PaymeTransaction::create([
            'booking_id' => $booking->id,
            'transaction_id' => null,
            'amount' => $sub->price,
            'state' => 0,
            'payment_status' => 'pending',
            'create_time' => null
        ]);

        if ($currentSubscription) {
            $currentSubscription->update([
                'sub_id' => $sub->id,
                'start_date' => now(),
                'end_date' => now()->addDays($sub->duration_days),
                'used_services_count' => 0,
                'status' => 'active',
            ]);
        } else {
            Subscription::create([
                'provider_id' => $user->id,
                'sub_id' => $sub->id,
                'start_date' => now(),
                'end_date' => now()->addDays($sub->duration_days),
                'used_services_count' => 0,
                'description_uz' => $sub->description_uz,
                'description_ru' => $sub->description_ru,
                'description_en' => $sub->description_en,
                'status' => 'active',
            ]);
        }

        return redirect()->route('payment.bron.show', ['booking' => $booking->id]);
    }

    public function cancelSubscription(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update([
            'status' => 'canceled',
            'end_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Obuna muvaffaqiyatli bekor qilindi!');
    }

    public function restartSubscription(Request $request)
    {
        $user = Auth::user();
        $currentSubscription = Subscription::where('provider_id', $user->id)
            ->where('end_date', '>=', now())
            ->with('sub')
            ->first();

        if (!$currentSubscription) {
            return redirect()->back()->with('error', 'Sizda faol obuna mavjud emas!');
        }

        // Pullik rejani cheklash
        if ($currentSubscription->sub->price > 0) {
            return redirect()->back()->with('error', 'Hozircha pullik rejalar mavjud emas, chunki to‘lov tizimi qo‘shilmagan.');
        }

        // Agar reja bepul bo‘lsa (Basic), restart qilishni cheklash
        if ($currentSubscription->sub->price == 0) {
            return redirect()->back()->with('error', 'Bepul rejani qayta boshlash mumkin emas!');
        }

        // Obunani qayta boshlash (bu qism hozircha ishlamaydi, chunki pullik rejalar cheklangan)
        $currentSubscription->update([
            'start_date' => now(),
            'end_date' => now()->addDays($currentSubscription->sub->duration_days),
            'used_services_count' => 0,
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Obuna muvaffaqiyatli qayta boshlandi!');
    }

    public function bron($id)
    {
        $order = Booking::find($id);
        $amount = $order['amount'];

        $paymeTransaction = PaymeTransaction::create([
            'booking_id' => $order->id,
            'transaction_id' => null,
            'amount' => $amount,
            'state' => 0,
            'payment_status' => 'pending',
            'create_time' => null
        ]);

        return redirect()->route('payment.bron.show', ['order' => $id, 'paymeTransaction' => $paymeTransaction]);
    }
    public function bronShow(Booking $booking)
    {
        $paymeTransaction = PaymeTransaction::where('booking_id', $booking->id)->first();
        return view('pages.payment', compact('booking', 'paymeTransaction'));
    }
    public function payment(Request $request)
    {
        $order = Booking::findOrFail($request->id);
        $amount = $order->amount;
        $transaction = PaymeTransaction::create([
            'booking_id' => $order->id,
            'transaction_id' => null,
            'amount' => $amount,
            'state' => 0,
            'payment_status' => 'pending',
            'create_time' => null
        ]);
        $transactionId = $transaction->id;

        $merchantId = '675fc27f47f4e3e488efaabe';
        $tiyinAmount = intval($amount * 100);
        $payload = "m={$merchantId};ac.transaction_id={$transactionId};a={$tiyinAmount}";
        $encoded = base64_encode($payload);
        $redirectUrl = "https://checkout.paycom.uz/{$encoded}";

        return redirect($redirectUrl);
    }
}
