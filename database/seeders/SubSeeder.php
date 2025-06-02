<?php

namespace Database\Seeders;

use App\Models\Sub;
use Illuminate\Database\Seeder;

class SubSeeder extends Seeder
{
    public function run()
    {
        Sub::create([
            'name_uz' => 'Basic',
            'name_ru' => 'Базовый',
            'name_en' => 'Basic',
            'price' => 0, // 0 so‘m
            'description_uz' => 'Oyiga 10 ta e‘lon joylashtirish,Cheksiz xabarlar yuborish va qabul qilish,Asosiy e‘lon sozlamalari,Profilingizni 2 tagacha kategoriyada ko‘rsatish',
            'description_ru' => '10 объявлений в месяц,Неограниченные сообщения,Базовые настройки объявлений,Отображение профиля в 2 категориях',
            'description_en' => '10 ads per month,Unlimited messaging,Basic ad settings,Profile display in up to 2 categories',
            'duration_days' => 30,
            'max_services_count' => 10, // 10 ta e‘lon
        ]);

        Sub::create([
            'name_uz' => 'Standard',
            'name_ru' => 'Стандартный',
            'name_en' => 'Standard',
            'price' => 80000, // 40 USD = 508,000 so‘m
            'description_uz' => 'Cheksiz e‘lonlar,Oyiga 50 ta e‘lonni ijtimoiy tarmoqlarda targ‘ib qilish,Google Analytics integratsiyasi,E‘lonlaringiz uchun maxsus statistika sahifasi',
            'description_ru' => 'Неограниченные объявления,Продвижение 50 объявлений в месяц в социальных сетях,Интеграция с Google Analytics,Персонализированная страница статистики для объявлений',
            'description_en' => 'Unlimited ads,Promote 50 ads per month on social media,Google Analytics integration,Custom statistics page for your ads',
            'duration_days' => 30,
            'max_services_count' => 9999, // Cheksiz e‘lonlar
        ]);

        Sub::create([
            'name_uz' => 'Enterprise',
            'name_ru' => 'Корпоративный',
            'name_en' => 'Enterprise',
            'price' => 120000, // 80 USD = 1,016,000 so‘m
            'description_uz' => 'Paypal va Stripe orqali to‘lov qabul qilish,Cheksiz e‘lonlar va targ‘iblar,5GB saqlash joyi bilan media yuklash,Maxsus domen qo‘llab-quvvatlash,API integratsiyasi',
            'description_ru' => 'Прием платежей через Paypal и Stripe,Неограниченные объявления и продвижения,Загрузка медиа с 5 ГБ хранилища,Поддержка пользовательских доменов,Интеграция с API',
            'description_en' => 'Accept payments via Paypal and Stripe,Unlimited ads and promotions,Media upload with 5GB storage,Custom domain support,API integration',
            'duration_days' => 30,
            'max_services_count' => 9999, // Cheksiz e‘lonlar
        ]);
    }
}
