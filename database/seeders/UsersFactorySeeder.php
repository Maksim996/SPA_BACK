<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\{ User, Info };

class UsersFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('constants.ROLES') as $role)
            $users = User::factory()->count(5)
                ->create(['role_id' => $role])
                ->each(function ($user) {
                    $user->info()->save(Info::factory()->make());
                });
    }
}
