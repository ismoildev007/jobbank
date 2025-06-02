<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'provider_id',
        'title_uz',
        'title_ru',
        'title_en',
        'slug',
        'description_uz',
        'description_ru',
        'description_en',
        'image',
        'price',
        'duration_hours',
        'available_days',
        'available_hours',
        'is_active',
        'type_price',
    ];

    protected $casts = [
        'available_days' => 'array',
        'available_hours' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}
