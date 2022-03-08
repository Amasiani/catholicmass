<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\File;

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
     * @return void
     */
    public function boot()
    {
        //booststrap paginator method library
        Paginator::useBootstrap();

        Schema::defaultStringLength(191);

        $this->autoload();

    }

    private function autoload() {
        if(File::exists(app_path('helper.php'))){
            require_once(app_path('helper.php'));
        }
    }

}
