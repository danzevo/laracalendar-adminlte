<?php

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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('event', [App\Http\Controllers\EventController::class, 'index'])->name('event');
    Route::get('event/get-data', [App\Http\Controllers\EventController::class, 'getData']);
    Route::post('event/save', [App\Http\Controllers\EventController::class, 'store']);
    Route::put('event/update/{id}', [App\Http\Controllers\EventController::class, 'update']);
    Route::post('event/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy']);
});
