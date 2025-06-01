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
}
