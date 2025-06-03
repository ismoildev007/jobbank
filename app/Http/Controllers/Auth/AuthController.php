<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case User::ROLE_PROVIDER:
                    return redirect()->route('services.index');
                case User::ROLE_ADMIN:
                    return redirect()->route('admin.dashboard');
                default:
                    Auth::logout();

                    return redirect('/')->withErrors(['role' => 'Invalid role assigned to the user.']);
            }
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);

    }

    public function register()
    {
        return view('auth.register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:0,1', // Role 0 yoki 1 bo‘lishi kerak
            'terms_policy' => 'required|accepted', // Checkbox majburiy
        ], [
            'full_name.required' => 'Ismni kiritish majburiy.',
            'phone.required' => 'Telefon raqamni kiritish majburiy.',
            'phone.unique' => 'Bu telefon raqam avval ro‘yxatdan o‘tgan.',
            'password.required' => 'Parolni kiritish majburiy.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
            'password.confirmed' => 'Tasdiqlovchi parol mos emas.',
            'role.required' => 'Rolni tanlash majburiy.',
            'terms_policy.required' => 'Shartlar va qoidalarni qabul qilish majburiy.',
            'terms_policy.accepted' => 'Shartlar va qoidalarni qabul qilishingiz kerak.',
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->role = $request->role == '1' ? User::ROLE_PROVIDER : User::ROLE_USER; // Role qiymatiga qarab belgilaymiz
        $user->save();

        auth()->login($user);
        switch ($user->role) {
            case User::ROLE_PROVIDER:
                return redirect()->route('admin.dashboard');
            case User::ROLE_ADMIN:
                return redirect()->route('admin.dashboard');
            default:
                Auth::logout();

                return redirect('/')->withErrors(['role' => 'Invalid role assigned to the user.']);
        }

//        return redirect()->route('admin.dashboard')->with('success', 'Siz muvaffaqiyatli ro‘yxatdan o‘tdingiz!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Вы успешно вышли из системы!');
    }

}
