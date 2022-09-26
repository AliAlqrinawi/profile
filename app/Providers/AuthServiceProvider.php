<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // CategoryOfWorkers::class => categoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user , $permissions){
            if($user->id == 1){
                return true;
            }
        });

        foreach (config('permission') as $permissions => $lable )
        {
            Gate::define($permissions , function($user) use($permissions){
                    return $user->permissions($permissions);
            });
        }
        //
    }
}
