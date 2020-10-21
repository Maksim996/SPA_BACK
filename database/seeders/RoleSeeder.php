<?php

namespace Database\Seeders;

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
    {;
        $roles = [];

        foreach (array_keys(config('constants.ROLES')) as $role) {
            $roles[] = [
                'role' => $role,
                'created_at' => now()
            ];
        }

        DB::table('roles')->insert($roles);
    }
}
