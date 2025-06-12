<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EskizService
{
    protected $baseUrl;
    protected $email;
    protected $password;
    protected $token;

     public function __construct()
     {
         $this->baseUrl = env('ESKIZ_BASE_URL', 'https://notify.eskiz.uz');
         $this->email = env('info@jobbank.uz');
         $this->password = env('RWxuqgoetmbQRnvRbfpn6aIjusOMgekI2DMBMWi9');

         $this->authenticate();
     }

     protected function authenticate()
     {
         $response = Http::post("{$this->baseUrl}/api/auth/login", [
             'email' => $this->email,
             'password' => $this->password,
         ]);

         if ($response->successful()) {
             $this->token = $response->json('data.token');
         } else {
             throw new \Exception('Eskiz API-ga autentifikatsiyada xatolik.');
         }
     }

     public function sendSms($phoneNumber, $message)
     {
         $response = Http::withToken($this->token)->post("{$this->baseUrl}/api/message/sms/send", [
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
