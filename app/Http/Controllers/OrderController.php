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
        $orders = Order::where('provider_id', Auth::id())->with(['service', 'user'])->latest()->paginate(10);
        return view('provider.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,done,rejected',
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated!');
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

    public function storeTezkorOrder(Request $request)
    {
        $validated = $request->validate([
            'additional_phone' => 'required|string|max:20',
            'category_id' => 'required|exists:categories,id',
            'region' => 'required|string|in:bektemir,chilonzor,mirzo-ulugbek,olmazor,sergeli,shayxontohur,uchtepa,yakkasaroy,yashnobod,yunusobod,yangihayot,mirobod',
            'notes' => 'required|string|max:1000',
            'price_range' => 'nullable|string|max:255', // Ixtiyoriy
        ]);


        Order::create([
            'user_id' => Auth::id() ?? null,
            'additional_phone' => $validated['additional_phone'],
            'category_id' => $validated['category_id'],
            'region' => $validated['region'],
            'notes' => $validated['notes'],
            'price_range' => $validated['price_range'] ?? null,
            'service_id' => null,
            'provider_id' => null,
            'order_date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Tezkor buyurtma muvaffaqiyatli yuborildi!');
    }
    public function showSuccess($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('pages.order.success', compact('service'));
    }
}
