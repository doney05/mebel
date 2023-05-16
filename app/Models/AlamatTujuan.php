<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatTujuan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id');
    }
    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class, 'alamat_tujuans_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'alamat_tujuans_id');
    }
}
