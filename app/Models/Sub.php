<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'price',
        'description_uz',
        'description_ru',
        'description_en',
        'duration_days',
        'max_services_count',
    ];
}
