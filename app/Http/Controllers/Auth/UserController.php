<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $orders = Auth::user()->orders; // Buyurtmalarni olish

        return view('auth.profile',compact('orders'));
    }

//    public function orders()
//    {
//        return view('user.orders');
//    }
//
//    public function cart()
//    {
//        return view('user.cart');
//    }
//
//    public function checkout()
//    {
//        return view('user.checkout');
//    }
}
