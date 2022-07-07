<?php
//namespace App\Http\Controllers; 


use App\Http\Controllers\Admin\AdorationController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ChurchController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SocietyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Models\Adoration;
use App\Models\Role;
use Illuminate\Routing\RouteRegistrar;
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
    return view('welcome');
});


Route::post('/resetLink', [PasswordResetController::class, 'resetLink'])->name('newLink.send');
Route::get('/create-link', [PasswordResetController::class, 'createLink'])->name('newLink');
Route::get('/admin', [WelcomeController::class, 'admin'])->name('admin');
Route::get('/home', [HomeController::class, 'redirect'])->name('home');
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/child', [HomeController::class, 'LitcalApi'])->name('child');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/contact-us', [ContactFormController::class, 'Contactindex'])->name('contact');
Route::post('/send-contact', [ContactFormController::class, 'sendContactMail'])->name('contact.send');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('churches', ChurchController::class);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function() {
    Route::resources([
        'announcements'=> AnnouncementController::class,
        'adorations' => AdorationController::class,
        
        'notifications' => NotificationController::class,
        'roles' => RoleController::class,
        'societies' => SocietyController::class,
        'users' => UserController::class,
    ]);
});