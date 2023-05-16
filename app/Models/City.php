<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = [];


    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }
    public function pesanandetail()
    {
        return $this->hasMany(PesananDetail::class, 'cities_id');
    }
}
