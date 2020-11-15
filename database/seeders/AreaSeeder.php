<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = array(
            'Автономна Республіка Крим', 'Вінницька', 'Волинська',
            'Дніпропетровська', 'Донецька', 'Житомирська',
            'Закарпатська', 'Запорізька', 'Івано-Франківська',
            'Київська', 'Кіровоградська', 'Луганська',
            'Львівська', 'Миколаївська', 'Одеська',
            'Полтавська', 'Рівненська', 'Сумська',
            'Тернопільська', 'Харківська', 'Херсонська',
            'Хмельницька', 'Черкаська', 'Чернівецька',
            'Чернігівська'
        );
        foreach ($areas as $areaName) {
            DB::table('areas')->insert([
                'area_name' => $areaName,
                'created_at' => now(),
            ]);
        }
    }
}
