<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $services = Auth::user()->services; // Buyurtmalarni olish

        return view('pages.providers.profile',compact('services'));
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
