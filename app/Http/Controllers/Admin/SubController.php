<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sub;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubController extends Controller
{
    public function index()
    {
        $subs = Sub::all();
        return view('admin.subscription.pricing', compact('subs'));
    }

    public function allSubscriptions()
    {
        $subscriptions = Subscription::whereHas('provider', function ($query) {
            $query->where('role', '1');
        })
            ->with(['provider', 'sub'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.subscription.all_subscriptions', compact('subscriptions'));
    }

    public function subscribe(Request $request, $subId)
    {
        $user = Auth::user();
        $sub = Sub::findOrFail($subId);

        // Pullik rejani cheklash (to‘lov tizimi yo‘qligi sababli)
        if ($sub->price > 0) {
            return redirect()->back()->with('error', 'Hozircha pullik rejalar mavjud emas, chunki to‘lov tizimi qo‘shilmagan.');
        }

        // Bepul versiyani bir marta ishlatish cheklovi
        if ($sub->price == 0) { // Bepul reja (Basic)
            $hasUsedFreePlan = Subscription::where('provider_id', $user->id)
                ->where('sub_id', $sub->id)
                ->exists();

            if ($hasUsedFreePlan) {
                return redirect()->back()->with('error', 'Siz bepul rejani umringiz davomida faqat bir marta ishlatishingiz mumkin!');
            }
        }

        // Standard rejani umri davomida faqat bir marta ishlatish cheklovi
        if ($sub->name_en === 'Standard') {
            $hasUsedStandard = Subscription::where('provider_id', $user->id)
                ->where('sub_id', $sub->id)
                ->exists();

            if ($hasUsedStandard) {
                return redirect()->back()->with('error', 'Siz Standard rejani umringiz davomida faqat bir marta ishlatishingiz mumkin!');
            }
        }

        // Foydalanuvchining joriy obunasini tekshirish
        $currentSubscription = Subscription::where('provider_id', $user->id)
            ->where('end_date', '>=', now())
            ->first();

        // Agar foydalanuvchi allaqachon faol obunaga ega bo‘lsa
        if ($currentSubscription && $currentSubscription->sub_id == $subId) {
            return redirect()->back()->with('error', 'Siz allaqachon ushbu rejaga obuna bo‘lgansiz!');
        }

        // Agar joriy obuna bo‘lsa, uni yangilaymiz, aks holda yangi obuna qo‘shamiz
        if ($currentSubscription) {
            $currentSubscription->update([
                'sub_id' => $sub->id,
                'start_date' => now(),
                'end_date' => now()->addDays($sub->duration_days),
                'used_services_count' => 0,
                'status' => 'active',
            ]);
        } else {
            Subscription::create([
                'provider_id' => $user->id,
                'sub_id' => $sub->id,
                'start_date' => now(),
                'end_date' => now()->addDays($sub->duration_days),
                'used_services_count' => 0,
                'description_uz' => $sub->description_uz,
                'description_ru' => $sub->description_ru,
                'description_en' => $sub->description_en,
                'status' => 'active',
            ]);
        }

        return redirect()->back()->with('success', 'Obuna muvaffaqiyatli faollashtirildi!');
    }

    public function cancelSubscription(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);

        // Obunani bekor qilish
        $subscription->update([
            'status' => 'canceled',
            'end_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Obuna muvaffaqiyatli bekor qilindi!');
    }

    public function restartSubscription(Request $request)
    {
        $user = Auth::user();
        $currentSubscription = Subscription::where('provider_id', $user->id)
            ->where('end_date', '>=', now())
            ->with('sub')
            ->first();

        if (!$currentSubscription) {
            return redirect()->back()->with('error', 'Sizda faol obuna mavjud emas!');
        }

        // Pullik rejani cheklash
        if ($currentSubscription->sub->price > 0) {
            return redirect()->back()->with('error', 'Hozircha pullik rejalar mavjud emas, chunki to‘lov tizimi qo‘shilmagan.');
        }

        // Agar reja bepul bo‘lsa (Basic), restart qilishni cheklash
        if ($currentSubscription->sub->price == 0) {
            return redirect()->back()->with('error', 'Bepul rejani qayta boshlash mumkin emas!');
        }

        // Obunani qayta boshlash (bu qism hozircha ishlamaydi, chunki pullik rejalar cheklangan)
        $currentSubscription->update([
            'start_date' => now(),
            'end_date' => now()->addDays($currentSubscription->sub->duration_days),
            'used_services_count' => 0,
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Obuna muvaffaqiyatli qayta boshlandi!');
    }
}
