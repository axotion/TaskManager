<?php

namespace TaskManager\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        '\TaskManager\Tasks' => '\TaskManager\Policies\TasksPolicy'
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        Gate::resource('tasks', '\TaskManager\Policies\TasksPolicy');
       //$gate->define('task-delete','\TaskManager\Policies\TasksPolicy@delete');


        //
    }
}
