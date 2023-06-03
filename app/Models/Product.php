<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'products_id');
    }
    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class, 'products_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'products_id');
    }
    public function terjual()
    {
        return $this->hasMany(ProductTerjual::class, 'products_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany(PaymentDetail::class, 'products_id');
    }
}
