<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route::view('/example_page', 'example_page');
// route::view('/auth_page', 'auth_page');

Auth::routes();

Route::prefix('/user')->name('user.')->group(function () {

    Route::middleware(['guest:user'])->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        
    });
});
