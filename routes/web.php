<?php

use App\Http\Controllers\Admin\AdorationController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ChurchController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SocietyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Models\Adoration;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function (){
    return view('home');
});
Route::get('/starter', function(){
    return view('starter');
});

Route::get('/page1', [WelcomeController::class], 'index');
Route::get('/page2', [HomeController::class], 'index');
Route::getRoutes('/page3', [ContactFormController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resources([
        'announcements'=> AnnouncementController::class,
        'adorations' => AdorationController::class,
        'churches' => ChurchController::class,
        'notifications' => NotificationController::class,
        'roles' => RoleController::class,
        'socities' => SocietyController::class,
        'users' => UserController::class
    ]);
});


