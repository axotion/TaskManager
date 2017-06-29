<?php

namespace TaskManager\Providers;


use Illuminate\Support\ServiceProvider;

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
