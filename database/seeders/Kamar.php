<?php

namespace Database\Seeders;

use App\Models\Kamar as ModelsKamar;
use Illuminate\Database\Seeder;

class Kamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsKamar::truncate();
        $room = [
            [
                'tipe_kamar' => '1',
                'no_kamar' => '101'
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '102'
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '103'
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '104',
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '105',
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '106'
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '107'
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '108'
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '109',
            ],
            [
                'tipe_kamar' => '1',
                'no_kamar' => '110',
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '201'
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '202'
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '203'
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '204',
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '205',
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '206'
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '207'
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '208'
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '209',
            ],
            [
                'tipe_kamar' => '2',
                'no_kamar' => '210',
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '301'
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '302'
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '303'
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '304',
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '305',
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '306'
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '307'
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '308'
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '309',
            ],
            [
                'tipe_kamar' => '3',
                'no_kamar' => '310',
            ],
        ];

        foreach ($room as $key => $value){
            ModelsKamar::create($value);
        }
    }
}
