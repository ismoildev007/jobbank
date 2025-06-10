<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title_uz',
        'title_ru',
        'title_en',
        'slug',
        'description_uz',
        'description_ru',
        'description_en',
        'image',
        'price',         // yangi qo‘shildi
        'is_featured',   // yangi qo‘shildi
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
