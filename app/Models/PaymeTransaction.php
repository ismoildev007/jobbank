<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymeTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'payment_status', 'transaction_id', 'state',
        'amount', 'create_time', 'perform_time', 'cancel_time', 'reason',
    ];


    public static function getTransactionsByTimeRange($from, $to)
    {
        return self::whereIn('state', [1, 2, -1, -2])
            ->whereBetween('create_time', [$from, $to])
            ->orderBy('create_time', 'asc')
            ->get();
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
