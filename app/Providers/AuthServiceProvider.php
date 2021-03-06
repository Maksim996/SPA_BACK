<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        // Gate::define('change-password', function ($user) {
        //     return $user->id;
        // });
        // Define Scope
        Passport::tokensCan([
            'root' => 'Add/Edit/Delete directors',
            'change-password' => 'User can ch password',
            'director' => 'Make description',
            'supervisor' => 'Make description',
            'administrator' => 'Make description',
            'doctor' => 'Make description',
            'medical_representative' => 'Make description',
        ]);

        // Default Scope
        Passport::setDefaultScope([
            'doctor'
        ]);
    }
}
