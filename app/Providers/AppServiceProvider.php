<?php

namespace TaskManager\Providers;

use Dotenv\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use TaskManager\Policies\TasksPolicy;

class AppServiceProvider extends ServiceProvider
{

    /**
     *
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \Validator::extend('match', function ($attribute, $value, $parameters, $validator) {
          //  dd($value, session()->get('code'));
           if($value == session()->get('code')){
               return true;
           }
           return false;
        });


\Schema::defaultStringLength(191);



    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
