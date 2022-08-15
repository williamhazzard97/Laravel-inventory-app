<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /**
         * Assign role of "Super Admin" to william before any gate,
         * this grants all privileges and works by utilising gate-related functions like auth()->user->can()
         */
        //Gate::before(function ($user) {
        //    return $user->hasRole('Super Admin') ? true : null;
        //});

    }
}
