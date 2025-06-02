<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'sub_id',
        'start_date',
        'end_date',
        'used_services_count',
        'description_uz',
        'description_ru',
        'description_en',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function sub()
    {
        return $this->belongsTo(Sub::class);
    }

    // Obuna faol ekanligini tekshirish
    public function isActive()
    {
        return $this->status === 'active' && $this->end_date > now();
    }

    // Obuna tugagan yoki bekor qilingan ekanligini tekshirish
    public function isInactive()
    {
        return $this->status !== 'active' || $this->end_date <= now();
    }

    // Obuna holatini qaytarish (active, canceled, expired)
    public function getStatusLabel()
    {
        if ($this->status === 'canceled') {
            return 'Bekor qilingan';
        }

        if ($this->end_date <= now()) {
            return 'Tugagan';
        }

        if ($this->status === 'active') {
            return 'Faol';
        }

        return 'Noma`lum';
    }
}
