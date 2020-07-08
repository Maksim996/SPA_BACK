<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_info')->insert([
            'first_name' => 'Admin',
            'second_name' => 'admin',
            'patronymic' => 'admin',
            'birthday' => now(),
            'phone' => '0981211111',
            'passport' => '123456789',
            'inn_code' => '0123456789',
            'sex' => 0,
            //'created_at' => now(),
        ]);
    }
}
