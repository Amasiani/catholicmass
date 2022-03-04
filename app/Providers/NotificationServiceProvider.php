<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('template', function($view){
            $view->with('notifications', Notification::all());
        });

        /**View::composer('template', function($view){
            $view->with('feast', [HomeController::class, 'LitcalApi']);
        });*/

    }
}
