<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::prefix('/admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {

        Route::view('/login', 'admin.BackEnd.page.admin.auth.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
        Route::view('/forgot_password', 'admin.Backend.page.admin.auth.forgot_password')->name('forgot_password');
        Route::post('/send_password_reset_link', [AdminController::class, 'sendPasswordResetLink'])->name('send_password_reset_link');
        Route::get('/password/reset/{token}', [AdminController::class, 'resetPassword'])->name('reset_password');
        Route::post('/password_reset_handler', [AdminController::class, 'resetPasswordHandler'])->name('password_reset_handler');
        
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {

        Route::view('/home', 'admin.Backend.page.admin.home')->name('home');
        Route::post('/logout_handler', [AdminController::class, 'logoutHandler'])->name('logout_handler');
        Route::get('/profile', [AdminController::class, 'profileView'])->name('profile');
        Route::post('/change_profile_picture', [AdminController::class, 'changeProfilePicture'])->name('change_profile_picture');

        Route::prefix('/roles')->name('roles.')->group(function () {
            Route::get('/index', [RoleController::class, 'index']);
            Route::get('/create', [RoleController::class, 'create']);
            Route::post('/create', [RoleController::class, 'store']);
            Route::get('/edit/{id}', [RoleController::class, 'edit']);
            Route::post('/edit/{id}', [RoleController::class, 'update']);
            Route::get('/show/{id}', [RoleController::class, 'show']);
            Route::post('/destroy', [RoleController::class, 'store']);
        });

        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/index', [UserController::class, 'index']);
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/store', [UserController::class, 'store']);
            Route::get('/edit/{id}', [UserController::class, 'edit']);
            Route::patch('/edit/{id}', [UserController::class, 'update']);

            Route::get('/show/{id}', [UserController::class, 'show']);
            Route::post('/destroy', [UserController::class, 'store']);
        });

        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/index', [ProductController::class, 'index']);
            Route::get('/create', [ProductController::class, 'create']);
            Route::post('/store', [ProductController::class, 'store']);
            Route::get('/edit/{id}', [ProductController::class, 'edit']);
            Route::patch('/edit/{id}', [ProductController::class, 'update']);

            Route::get('/show/{id}', [ProductController::class, 'show']);
            Route::post('/destroy', [ProductController::class, 'store']);
        });
    });
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
// });



// Route::group(['namespace' => 'App\Http\Controllers'], function()
// {   
//     // /**
//     //  * Home Routes
//     //  */
//     // Route::get('/', 'HomeController@index')->name('home.index');

//     Route::group(['middleware' => ['guest']], function() {
//         /**
//          * Register Routes
//          */
//         // Route::get('/register', 'RegisterController@show')->name('register.show');
//         // Route::post('/register', 'RegisterController@register')->name('register.perform');

//         // /**
//         //  * Login Routes
//         //  */
//         // Route::get('/login', 'LoginController@show')->name('login.show');
//         // Route::post('/login', 'LoginController@login')->name('login.perform');

//     });

//     Route::group(['middleware' => ['auth', 'permission']], function() {
//         /**
//          * Logout Routes
//          */
//         // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

//         /**
//          * User Routes
//          */
//         // Route::group(['prefix' => 'users'], function() {
//         //     Route::get('/', 'UsersController@index')->name('users.index');
//         //     Route::get('/create', 'UsersController@create')->name('users.create');
//         //     Route::post('/create', 'UsersController@store')->name('users.store');
//         //     Route::get('/{user}/show', 'UsersController@show')->name('users.show');
//         //     Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
//         //     Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
//         //     Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
//         // });

//         /**
//          * User Routes
//          */
//         // Route::group(['prefix' => 'posts'], function() {
//         //     Route::get('/', 'PostsController@index')->name('posts.index');
//         //     Route::get('/create', 'PostsController@create')->name('posts.create');
//         //     Route::post('/create', 'PostsController@store')->name('posts.store');
//         //     Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
//         //     Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
//         //     Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
//         //     Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
//         // });

//         // Route::resource('roles', RolesController::class);
//         // Route::resource('permissions', PermissionsController::class);
//     });
// });