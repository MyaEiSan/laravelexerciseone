<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // view()->composer('*',function($view){
        //     $getyear = date("Y"); //2023 
        //     $gettoday = date("d/M/Y"); //17/Jun/2023
        //     $view->with('getyear',$getyear)->with('gettoday',$gettoday);
        // });


        // use Illuminate\Support\Facades\View;
        View::composer('*',function($view){
            $getyear = date("Y"); //2023 
            $gettoday = date("d/M/Y"); //17/Jun/2023
            $view->with('getyear',$getyear)->with('gettoday',$gettoday);
        });

        // =>Single
        View::composer('employees.index',function($view){
            $thanks = "Thank you for shopping with us.";
            $view->with('thanks',$thanks);
        });


        // =>Multi
        View::composer(['layouts.index','members.index'],function($view){
            $services = "Thank you for using our service.";
            $view->with('services',$services);
        });

        View::share('demo','Do you want our demo version.');

    }
}
