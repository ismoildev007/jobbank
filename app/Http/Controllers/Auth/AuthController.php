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
            'phone' => 'required|string',
        ]);

        try {
            $phoneNumber = str_replace([' ', ')', '('], '', $request->phone_number);
            $code = rand(100000, 999999);
            $message = 'Jobbank.uz platformasiga kirish uchun kod / Kod dlya avtorizatsiya v platforme Jobbank.uz: ' . $code;

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
        \Log::info('Received phone: ' . $phone);

        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return response()->json(['error' => 'Bunday telefon raqam ro‘yxatdan o‘tmagan.'], 404);
        }

        try {
            $code = rand(100000, 999999);
            $message = 'Jobbank.uz platformasiga kirish uchun kod / Kod dlya avtorizatsiya v platforme Jobbank.uz: ' . $code;

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

    public function sendLoginCode(Request $request)
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
            $message = 'Login tasdiqlash kodi: ' . $code;

            Cache::put('login_code_' . $phone, $code, now()->addMinutes(10));

            $this->eskizService->sendSms($phone, $message);

            return response()->json(['message' => 'Login uchun tasdiqlash kodi yuborildi.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyLoginCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
            'password' => 'required|string',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $cachedCode = Cache::get('login_code_' . $phone);

        if ($cachedCode && $cachedCode == $request->code) {
            $credentials = [
                'phone' => $phone,
                'password' => $request->password,
            ];

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

            return redirect()->route('login')->withErrors(['password' => 'Noto‘g‘ri parol.']);
        }

        return response()->json(['error' => 'Noto‘g‘ri kod kiritildi.'], 400);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);

        // SMS kodini yuborish
        try {
            $code = rand(100000, 999999);
            $message = 'Login tasdiqlash kodi: ' . $code;
            Cache::put('login_code_' . $phone, $code, now()->addMinutes(10));
            $this->eskizService->sendSms($phone, $message);
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['phone' => 'SMS yuborishda xatolik: ' . $e->getMessage()]);
        }

        // Foydalanuvchini kodni kiritish sahifasiga yo‘naltirish
        return view('auth.verify-login', ['phone' => $phone]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function sendRegisterCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|unique:users,phone',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);

        try {
            $code = rand(100000, 999999);
            $message = 'Ro‘yxatdan o‘tish tasdiqlash kodi: ' . $code;

            Cache::put('register_code_' . $phone, $code, now()->addMinutes(10));

            $this->eskizService->sendSms($phone, $message);

            return response()->json(['message' => 'Ro‘yxatdan o‘tish uchun tasdiqlash kodi yuborildi.', 'phone' => $phone]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyRegisterCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
            'full_name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:0,1',
            'terms_policy' => 'required|accepted',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $cachedCode = Cache::get('register_code_' . $phone);

        if ($cachedCode && $cachedCode == $request->code) {
            $user = new User();
            $user->full_name = $request->full_name;
            $user->phone = $phone;
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

        return response()->json(['error' => 'Noto‘g‘ri kod kiritildi.'], 400);
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:0,1',
            'terms_policy' => 'required|accepted',
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

        $phone = str_replace([' ', ')', '('], '', $request->phone);

        try {
            $code = rand(100000, 999999);
            $message = 'Ro‘yxatdan o‘tish tasdiqlash kodi: ' . $code;
            Cache::put('register_code_' . $phone, $code, now()->addMinutes(10));
            $this->eskizService->sendSms($phone, $message);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['phone' => 'SMS yuborishda xatolik: ' . $e->getMessage()]);
        }

        return view('auth.verify-register', [
            'full_name' => $request->full_name,
            'phone' => $phone,
            'password' => $request->password,
            'role' => $request->role,
            'terms_policy' => $request->terms_policy,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Siz muvaffaqiyatli tizimdan chiqdingiz!');
    }
}
