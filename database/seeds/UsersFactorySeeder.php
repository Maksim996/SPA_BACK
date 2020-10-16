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
        foreach (config('constants.ROLES') as $role)
            $users = factory(App\User::class, 5)
                ->create(['role_id' => $role])
                ->each(function ($user) {
                    $user->info()->save(factory(App\Info::class)->make());
                });
    }
}
