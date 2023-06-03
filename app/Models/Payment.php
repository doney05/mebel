<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }
    public function detail()
    {
        return $this->belongsTo(PaymentDetail::class, 'payment_details_id');
    }

}
