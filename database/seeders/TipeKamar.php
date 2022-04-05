<?php

namespace Database\Seeders;

use App\Models\TipeKamar as ModelsTipeKamar;
use Illuminate\Database\Seeder;

class TipeKamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsTipeKamar::truncate();
        $tipe = [
            [
                'name' => 'Reguler',
                'id_fasilitas' => 'AC, Wifi',
                'info' => 'blablabla',
                'harga' => '200000',
                'foto' => 'kamar5.png',
            ],
            [
                'name' => 'Deluxe',
                'id_fasilitas' => 'AC, Wifi, TV, Sprei premium',
                'info' => 'blablabla',
                'harga' => '500000',
                'foto' => 'kamar2.png',
            ],
            [
                'name' => 'Ekonomi',
                'id_fasilitas' => 'AC, Wifi, TV',
                'info' => 'blablabla',
                'harga' => '350000',
                'foto' => 'kamar1.jpg',
            ],
        ];

        foreach($tipe as $key => $val){
            ModelsTipeKamar::create($val);
        }
    }
}
