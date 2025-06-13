<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class EskizService
{
    protected $baseUrl;
    protected $email;
    protected $password;

    public function __construct()
    {
        $this->baseUrl = env('ESKIZ_BASE_URL', 'https://notify.eskiz.uz');
        $this->email = env('ESKIZ_EMAIL', 'info@jobbank.uz');
        $this->password = env('ESKIZ_PASSWORD', 'RWxuqgoetmbQRnvRbfpn6aIjusOMgekI2DMBMWi9');
    }

    protected function getToken()
    {
        // 24 soatlik keshdan tokenni olish yoki yangi token yaratish
        return Cache::remember('eskiz_token', now()->addHours(24), function () {
            $response = Http::post("{$this->baseUrl}/api/auth/login", [
                'email' => $this->email,
                'password' => $this->password,
            ]);

            if ($response->successful()) {
                return $response->json('data.token');
            }

            throw new \Exception('Eskiz API-ga autentifikatsiyada xatolik.');
        });
    }

    public function sendSms($phoneNumber, $message)
    {
        $response = Http::withToken($this->getToken())->post("{$this->baseUrl}/api/message/sms/send", [
            'mobile_phone' => $phoneNumber,
            'message' => $message,
            'from' => '4546',
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('SMS yuborishda xatolik: ' . $response->body());
    }
}
