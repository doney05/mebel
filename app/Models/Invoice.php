<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'invoices_id');
    }
    public static function boot()
    {
        parent::boot();
        Invoice::creating(function($pesan){
            $pesan->number = Invoice::max('number') + 1;
            $pesan->invoice = 'INV'.'/'. Carbon::now()->format('Ymd') . '/'. str_pad($pesan->number, 5, '0', STR_PAD_LEFT);
        });
    }
}
