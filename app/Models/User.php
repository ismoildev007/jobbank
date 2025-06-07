<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = '2';
    const ROLE_PROVIDER = '1';
    const ROLE_USER = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'phone',
        'password',
        'role',
        'status',
        'is_verified',
        'address',
        'avatar',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'provider_id','id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'provider_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'provider_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
