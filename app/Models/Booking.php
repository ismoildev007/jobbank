<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use  HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'sub_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sub()
    {
        return $this->belongsTo(Sub::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function paymeTransactions()
    {
        return $this->hasMany(PaymeTransaction::class);
    }
}
