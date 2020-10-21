<?php

namespace Database\Seeders;

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
            'user_id' => '1',
            'first_name' => 'Admin',
            'second_name' => 'admin',
            'patronymic' => 'admin',
            'birthday' => now(),
            'phone' => '380981211111',
            'type_passport' => 1,
            'passport' => '123456789',
            'inn_code' => '0123456789',
            'sex' => 0,
            'image' => 'https://randomuser.me/api/portraits/men/23.jpg'
            //'created_at' => now(),
        ]);
    }
}
