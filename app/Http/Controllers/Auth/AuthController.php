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

    private function checkAndSendSms($phone, $messageType)
    {
        $phone = str_replace([' ', ')', '('], '', $phone);
        $cacheKey = "sms_limit_{$phone}_{$messageType}";
        $lastSentKey = "last_sent_{$phone}_{$messageType}";
        $limit = 3; // 24 soatda maksimal 3 ta SMS
        $interval = 2 * 60; // 2 daqiqa (120 soniya)

        // 24 soat ichidagi yuborilgan SMS sonini olish
        $sentCount = Cache::get($cacheKey, 0);
        $lastSent = Cache::get($lastSentKey, 0);

        // Cheklovlarni tekshirish
        if ($sentCount >= $limit) {
            return response()->json(['error' => '24 soat ichida maksimal 3 ta SMS yuborish imkoni bor.'], 429);
        }

        if ($lastSent > 0 && (time() - $lastSent) < $interval) {
            $remaining = ($interval - (time() - $lastSent)) / 60;
            return response()->json(['error' => "Iltimos, {$remaining} daqiqa kuting, keyin qayta urining."], 429);
        }

        // Yangi kodni yaratish va yuborish
        $code = rand(100000, 999999);
        $message = 'Jobbank.uz platformasiga kirish uchun kod / Kod dlya avtorizatsiya v platforme Jobbank.uz: ' . $code;

        try {
            $this->eskizService->sendSms($phone, $message);
            Cache::put($cacheKey, $sentCount + 1, now()->addHours(24)); // 24 soatda saqlash
            Cache::put($lastSentKey, time(), now()->addHours(24)); // Oxirgi yuborilgan vaqtni saqlash
            Cache::put("{$messageType}_code_{$phone}", $code, now()->addMinutes(10)); // Kodni 10 daqiqa saqlash

            return response()->json(['message' => "Ro‘yxatdan o‘tish uchun tasdiqlash kodi yuborildi.", 'phone' => $phone]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sendSms(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $phoneNumber = str_replace([' ', ')', '('], '', $request->phone_number);
        return $this->checkAndSendSms($phoneNumber, 'sms');
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

        return $this->checkAndSendSms($phone, 'forgot');
    }

    public function verifyResetCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $cachedCode = Cache::get('forgot_code_' . $phone);

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

        $phone = str_replace([' ', ')', '('], '', $request->input('phone'));
        $cachedToken = Cache::get('reset_token_' . $phone);

        if ($cachedToken && $cachedToken === $request->input('token')) {
            $user = User::where('phone', $phone)->first();

            if ($user) {
                $user->password = Hash::make($request->input('password'));
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

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        $credentials['phone'] = $phone;

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $redirect = match ($user->role) {
                User::ROLE_PROVIDER => route('services.index'),
                User::ROLE_ADMIN => route('admin.dashboard'),
                User::ROLE_USER => route('user.profile'),
                default => null,
            };

            if ($redirect) {
                return response()->json(['message' => 'Login muvaffaqiyatli.', 'redirect' => $redirect]);
            } else {
                Auth::logout();
                return response()->json(['error' => 'Invalid role assigned to the user.'], 400);
            }
        }

        return response()->json(['error' => 'Noto‘g‘ri telefon raqam yoki parol.'], 400);
    }

    public function providerRegister()
    {
        return view('admin.provider.register');
    }

    public function sendRegisterCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|unique:users,phone',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);

        return $this->checkAndSendSms($phone, 'register');
    }

    public function verifyRegisterCode(Request $request)
    {
        \Log::info('Verify Register Request: ', $request->all());
        \Log::info('Request headers: ', $request->header());

        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
            'full_name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:0,1',
            'terms_policy' => 'required|accepted',
        ]);

        $phone = str_replace([' ', ')', '('], '', $request->phone);
        \Log::info('Processed phone: ' . $phone);
        $cachedCode = Cache::get('register_code_' . $phone);

        if ($cachedCode && $cachedCode == $request->code) {
            $user = new User();
            $user->full_name = $request->full_name;
            $user->phone = $phone;
            $user->password = bcrypt($request->password);
            $user->role = $request->role == '1' ? User::ROLE_PROVIDER : User::ROLE_USER;
            $user->status = 'Bloklangan';
            $user->save();
            \Log::info('User saved: ' . $user->id);

            auth()->login($user, true);
            \Log::info('User logged in: ' . auth()->user()->id);
            \Log::info('Session ID: ' . session()->getId());

            $redirect = match ($user->role) {
                User::ROLE_PROVIDER => route('services.index'),
                User::ROLE_ADMIN => route('admin.dashboard'),
                User::ROLE_USER => route('user.profile'),
                default => route('user.profile'),
            };

            Cache::forget('register_code_' . $phone);

            return response()->json([
                'message' => 'Ro‘yxatdan o‘tish muvaffaqiyatli.',
                'redirect' => $redirect
            ], 200);
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

        // SMS kodini yuborish
        try {
            $code = rand(100000, 999999);
            $message = 'Jobbank.uz platformasiga kirish uchun kod / Kod dlya avtorizatsiya v platforme Jobbank.uz: ' . $code;
            Cache::put('register_code_' . $phone, $code, now()->addMinutes(10));
            $this->eskizService->sendSms($phone, $message);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['phone' => 'SMS yuborishda xatolik: ' . $e->getMessage()]);
        }

        // Modalni yangilash uchun ma’lumot qaytarish
        return response()->json([
            'message' => 'Kod yuborildi.',
            'full_name' => $request->full_name,
            'phone' => $phone,
            'password' => $request->password,
            'role' => $request->role,
            'terms_policy' => $request->terms_policy,
        ]);
    }

    public function adminRegisterProvider(Request $request)
    {
        // Validatsiya qoidalari
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:0,1',
            'status' => 'nullable|in:Aktiv,Bloklangan', // Provider uchun status qo'shildi
        ], [
            'full_name.required' => 'Ismni kiritish majburiy.',
            'phone.required' => 'Telefon raqamni kiritish majburiy.',
            'phone.unique' => 'Bu telefon raqam avval ro‘yxatdan o‘tgan.',
            'password.required' => 'Parolni kiritish majburiy.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
            'password.confirmed' => 'Tasdiqlovchi parol mos emas.',
            'role.required' => 'Rolni tanlash majburiy.',
        ]);

        try {
            // Telefon raqamni tozalash
            $phone = str_replace([' ', ')', '('], '', $request->phone);

            // Foydalanuvchi yaratish
            $user = new User();
            $user->full_name = $request->full_name;
            $user->phone = $phone;
            $user->password = Hash::make($request->password); // Parolni shifrlash
            $user->role = $request->role;
            $user->status = $request->status ?? 'Aktiv'; // Agar status kiritilmagan bo'lsa, default 'Aktiv'
            $user->save();

            // Muvaffaqiyatli xabar
            return redirect()->back()->with('success', 'Provider muvaffaqiyatli ro‘yxatdan o‘tdi.');

        } catch (\Exception $e) {
            // Xatolik bo'lsa
            return redirect()->back()->withErrors(['error' => 'Ro‘yxatdan o‘tkazishda xatolik: ' . $e->getMessage()]);
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
