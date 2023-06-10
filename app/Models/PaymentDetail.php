<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class PaymentDetail extends Model
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
    public function alamat()
    {
        return $this->belongsTo(AlamatTujuan::class, 'alamat_tujuans_id');
    }
    public function cartdetail()
    {
        return $this->belongsTo(CartDetail::class, 'cart_details_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'payment_details_id');
    }
}
