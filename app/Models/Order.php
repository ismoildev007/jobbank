<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'provider_id',
        'service_id',
        'category_id',
        'order_date',
        'status', // qo‘shildi
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

    // App\Models\Order.php
    public function scopeRecentForService($query, $userId, $serviceId)
    {
        return $query->where('user_id', $userId)
            ->where('service_id', $serviceId)
            ->where('order_date', '>=', now()->subDay());
    }

}
