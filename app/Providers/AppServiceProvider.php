<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use App\Setting;

use ConsoleTVs\Charts\Registrar as Charts;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Charts $charts
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        foreach (File::directories(app_path("Modules")) as $moduleDir) {
            View::addLocation($moduleDir . "/views");


        }
 view()->share('settings', Setting::first());

    }
}
