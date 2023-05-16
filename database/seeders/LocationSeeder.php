<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarProvinsi = Http::withHeaders([
            'key' => 'efcf87824a2fd93eb0bf4ad016d676c8'
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinsi = $daftarProvinsi['rajaongkir']['results'];
        // dd($provinsi);
        foreach ($provinsi as $value) {
            Province::create([
                // 'id' => $value->province_id,
                'title' => $value['province']
            ]);
        }

        $daftarKota = Http::withHeaders([
            'key' => 'efcf87824a2fd93eb0bf4ad016d676c8'
        ])->get('https://api.rajaongkir.com/starter/city');

        $kota = $daftarKota['rajaongkir']['results'];
        // dd($kota);
        foreach ($kota as $item) {
            City::create([
                'provinces_id' => $item['province_id'],

                'title' => $item['city_name']
            ]);
        }

    }
}
