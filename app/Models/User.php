<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'google_id',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'users_id');
    }
    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class, 'users_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'users_id');
    }
    public function alamat()
    {
        return $this->hasMany(AlamatTujuan::class, 'users_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'users_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany(PaymentDetail::class, 'users_id');
    }
}
