<?php
//namespace App\Http\Controllers;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\ChurchController;
use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function() {
    Route::apiResources([
        'churches' => ChurchController::class]);
});
*/

Route::middleware('auth:sanctum')->name('api.')->group(function(){
    Route::apiResources(
        ['churches' => ChurchController::class]);
});



Route::get('churches/search/{name}', [ChurchController::class, 'search'])->name('church.search');
Route::post('users/login', [AuthController::class, 'login'])->name('user.token');
Route::post('users/logout', [AuthController::class, 'logout'])->name('token.delete');
Route::post('users/register', [AuthController::class, 'register'])->name('user.register');