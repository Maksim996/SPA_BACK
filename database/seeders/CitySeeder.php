<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'region_id' => 16,
            'city' => "Суми",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 1,
            'city' => "Охтирка",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 6,
            'city' => "Глухів",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 7,
            'city' => "Конотоп",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 10,
            'city' => "Лебедин",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 14,
            'city' => "Ромни",
            'created_at' => now(),
        ]);
            DB::table('cities')->insert([
            'region_id' => 18,
            'city' => "Шостка",
            'created_at' => now(),
        ]);

    }
}
