<?php

use Illuminate\Database\Seeder;

class UsersFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 20)
            ->create()
            ->each(function ($user) {
                $user->info()->save(factory(App\Info::class)->make());
            });
    }
}
