<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EskizService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $eskizService;

    public function __construct(EskizService $eskizService)
    {
        $this->eskizService = $eskizService;
    }

    public function sendSms(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
        ]);

        try {
            $phoneNumber = str_replace([' ', ')', '('], '', $request->phone_number);
            $code = rand(100000, 999999);
            $message = 'Tasdiqlash kodi: ' . $code;

            // Kodni keshda saqlash (10 daqiqa)
            Cache::put('sms_code_' . $phoneNumber, $code, now()->addMinutes(10));

            $this->eskizService->sendSms($phoneNumber, $message);

            return response()->json(['message' => 'SMS muvaffaqiyatli yuborildi']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return response()->json(['error' => 'Bunday telefon raqam ro‘yxatdan o‘tmagan.'], 404);
        }

        try {
            $code = rand(100000, 999999);
            $message = 'Parolni tiklash kodi: ' . $code;

            // Kodni keshda saqlash (10 daqiqa)
            Cache::put('reset_code_' . $phone, $code, now()->addMinutes(10));

            $this->eskizService->sendSms($phone, $message);

            return response()->json(['message' => 'Parolni tiklash kodi SMS orqali yuborildi.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyResetCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $cachedCode = Cache::get('reset_code_' . $phone);

        if ($cachedCode && $cachedCode == $request->code) {
            // Kod to‘g‘ri, parolni yangilash uchun token yaratish
            $token = bin2hex(random_bytes(32));
            Cache::put('reset_token_' . $phone, $token, now()->addMinutes(30));

            return response()->json(['message' => 'Kod tasdiqlandi.', 'token' => $token]);
        }

        return response()->json(['error' => 'Noto‘g‘ri kod kiritildi.'], 400);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $cachedToken = Cache::get('reset_token_' . $phone);

        if ($cachedToken && $cachedToken === $request->token) {
            $user = User::where('phone', $phone)->first();

            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();

                // Keshni tozalash
                Cache::forget('reset_code_' . $phone);
                Cache::forget('reset_token_' . $phone);

                return response()->json(['message' => 'Parol muvaffaqiyatli yangilandi.']);
            }

            return response()->json(['error' => 'Foydalanuvchi topilmadi.'], 404);
        }

        return response()->json(['error' => 'Noto‘g‘ri token.'], 400);
    }

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
                case User::ROLE_USER:
                    return redirect()->route('user.profile');
                default:
                    Auth::logout();
                    return redirect('/')->withErrors(['role' => 'Invalid role assigned to the user.']);
            }
        }

        return redirect()->route('login')->withErrors(['phone' => 'Invalid credentials.']);
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
        $user->role = $request->role == '1' ? User::ROLE_PROVIDER : User::ROLE_USER;
        $user->status = 'Bloklangan';
        $user->save();

        auth()->login($user);
        switch ($user->role) {
            case User::ROLE_PROVIDER:
                return redirect()->back()->with('success', 'Ro‘yxatdan o‘tdingiz.');
            case User::ROLE_ADMIN:
                return redirect()->route('admin.dashboard');
            case User::ROLE_USER:
                return redirect()->back()->with('success', 'Ro‘yxatdan o‘tdingiz.');
            default:
                Auth::logout();
                return redirect('/')->withErrors(['role' => 'Invalid role assigned to the user.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Siz muvaffaqiyatli tizimdan chiqdingiz!');
    }
}
