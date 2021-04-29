<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',

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
         * authorization admin role
         */
        Gate::define('admin',function (User $user){
            return $user->isAdmin();
        });

        /**
         * authorization manager role
         */
        Gate::define('manager', function (User $user) {
            return $user->isManager();
        });


        /**
         * authorization planificateur role
         */
        Gate::define('planificateur', function (User $user) {
            return $user->isPlanificateur();
        });
         Gate::define('technicien', function (User $user) {
             return $user->isTechnicien();
         });
    }
}
