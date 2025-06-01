<?php

namespace App\Http\Controllers\provider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function dashboard()
    {
        $services = Auth::user()->services; // Buyurtmalarni olish

        return view('pages.providers.profile',compact('services'));
    }

    public function profile()
    {
        $services = Auth::user()->services; // Buyurtmalarni olish
        return view('pages.providers.profile',compact('services'));
    }

    public function orders()
    {
        return view('pages.providers.orders');
    }

    public function subscription()
    {
        return view('pages.providers.subscription');
    }
}
