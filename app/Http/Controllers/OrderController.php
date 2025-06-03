<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function providerOrders()
    {
        $orders = Order::where('provider_id', Auth::id())->with(['service', 'user'])->latest()->get();
        return view('provider.orders', compact('orders'));
    }
    public function createOrder(Request $request, $serviceId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Buyurtma berish uchun tizimga kiring.');
        }

        $service = Service::findOrFail($serviceId);

        $order = Order::create([
            'user_id' => Auth::id(),
            'provider_id' => $service->provider_id,
            'service_id' => $service->id,
            'category_id' => $service->category_id,
            'order_date' => now(),
        ]);


        return redirect()->back()->with('success', 'Buyurtma muvaffaqiyatli yuborildi!');
    }
}
