<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'provider_id',
        'service_id',
        'category_id',
        'sub_category_id', // Yangi qo'shilgan
        'order_date',
        'status',
        'address',
        'additional_phone',
        'notes',
        'region', // Yangi qo'shilgan
        'price_range', // Yangi qo'shilgan (ixtiyoriy)
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    protected static function booted()
    {
        static::created(function ($order) {
            if ($order->provider) {
                $order->provider->increment('orders_count');
            }
        });
    }

    public function scopeRecentForService($query, $userId, $serviceId)
    {
        return $query->where('user_id', $userId)
            ->where('service_id', $serviceId)
            ->where('order_date', '>=', now()->subDay());
    }
}
