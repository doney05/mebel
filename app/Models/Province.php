<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city()
    {
        return $this->hasMany(City::class, 'provinces_id');
    }
    public function pesanandetail()
    {
        return $this->hasMany(PesananDetail::class, 'provinces_id');
    }
}
