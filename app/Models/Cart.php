<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class, 'carts_id');
    }
}
