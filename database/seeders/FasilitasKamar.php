<?php

namespace Database\Seeders;

use App\Models\FasilitasKamar as ModelsFasilitasKamar;
use Illuminate\Database\Seeder;

class FasilitasKamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsFasilitasKamar::truncate();
        $fasilitas = [
            [
                'name' => 'Wifi',
            ],
            [
                'name' => 'AC',
            ],
            [
                'name' => 'TV',
            ],
            [
                'name' => 'Sprei premium',
            ],
            [
                'name' => 'Kopi/teh',
            ],
        ];

        foreach($fasilitas as $key => $val){
            ModelsFasilitasKamar::create($val);
        }
    }
}
