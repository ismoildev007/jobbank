<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        dd($request);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Agar superAdmin bo‘lsa, uni admin panelga yuboramiz
            if ($user->hasRole('superAdmin')) {
                return redirect()->route('dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Login yoki parol noto‘g‘ri']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}

