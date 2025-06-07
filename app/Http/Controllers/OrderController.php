<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function showOrderPage($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('pages.order.page-order', compact('service'));
    }


    public function providerOrders()
    {
        $orders = Order::where('provider_id', Auth::id())->with(['service', 'user'])->latest()->get();
        return view('provider.orders', compact('orders'));
    }

    public function store(Request $request, $serviceId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'additional_phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string|max:1000',
        ]);

        $service = Service::findOrFail($serviceId);

        Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'provider_id' => $service->provider_id,
            'service_id' => $service->id,
            'category_id' => $service->category_id,
            'order_date' => now(),
            'status' => 'pending',
            'address' => $request->address,
            'additional_phone' => $request->additional_phone,
            'notes' => $request->notes,
        ]);

        return redirect()->route('order.success', ['service' => $service->id])->with('success', 'Buyurtma muvaffaqiyatli yuborildi!');
    }
    public function showSuccess($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('pages.order.success', compact('service'));
    }
}
