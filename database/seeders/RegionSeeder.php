<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sumyAreaId = 18;
        $sumyArea = [
            'Охтирський', 'Білопільський', 'Буринський',
            'Великописарівський', 'Глухівський',
            'Конотопський', 'Краснопільський', 'Кролевецький',
            'Лебединський', 'Липоводолинський',
            'Недригайлівський', 'Путивльський', 'Роменський',
            'Середино-Будський', 'Сумський', 'Тростянецький',
            'Шосткинський', 'Ямпільський'
        ];
        foreach($sumyArea as $regionName) {
            DB::table('regions')->insert([
                'area_id' => $sumyAreaId,
                'region_name' => $regionName,
                'created_at' => now(),
            ]);
        }

    }
}

// var regions = [];
// for(var i = 521; i <= 546; i++){
//     var el = document.querySelector('#itemTextLink' + i);
//     regions.push(el.innerHTML);
// }
// console.table(regions);
