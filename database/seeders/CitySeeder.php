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
            'city_name' => "м. Суми",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 1,
            'city_name' => "м. Охтирка",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 6,
            'city_name' => "м. Глухів",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 7,
            'city_name' => "м. Конотоп",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 10,
            'city_name' => "м. Лебедин",
            'created_at' => now(),
        ]);
        DB::table('cities')->insert([
            'region_id' => 14,
            'city_name' => "м. Ромни",
            'created_at' => now(),
        ]);
            DB::table('cities')->insert([
            'region_id' => 18,
            'city_name' => "м. Шостка",
            'created_at' => now(),
        ]);

    }
}
