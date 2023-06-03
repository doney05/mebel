<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'carts_id');
    }
    public function alamat()
    {
        return $this->belongsTo(AlamatTujuan::class, 'alamat_tujuans_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany(PaymentDetail::class, 'cart_details_id');
    }
}
