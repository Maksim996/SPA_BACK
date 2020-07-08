<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'root',
            'created_at' => now()
        ]);
        DB::table('roles')->insert([
            'role' => 'director',
            'created_at' => now()
        ]);
        DB::table('roles')->insert([
            'role' => 'supervisor',
            'created_at' => now()
        ]);
        DB::table('roles')->insert([
            'role' => 'administrator',
            'created_at' => now()
        ]);
        DB::table('roles')->insert([
            'role' => 'doctor',
            'created_at' => now()
        ]);
        DB::table('roles')->insert([
            'role' => 'medical_representative',
            'created_at' => now()
        ]);
    }
}
