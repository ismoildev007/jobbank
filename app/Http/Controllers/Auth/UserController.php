<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userProfile()
    {
        $user = Auth::user();
        return view('pages.user.profile', compact('user'));
    }

    public function userDashboard()
    {
        $services = Auth::user()->services; // Buyurtmalarni olish

        return view('pages.user.dashboard',compact('services'));
    }

    public function userUpdateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'full_name'     => 'nullable|string|max:255',
            'email'          => 'nullable|email',
            'phone' => 'nullable|string|unique:users,phone,' . $user->id,
        ]);


        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get(); // Buyurtmalarni olish
        return view('pages.user.orders', compact('orders'));
    }


    public function services()
    {
        $services = Auth::user()->services; // Buyurtmalarni olish
        return view('user.orders');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }
}
