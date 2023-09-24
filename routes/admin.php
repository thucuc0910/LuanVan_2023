<?php

use App\Http\Controllers\User\CheckoutPaymentController;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controller Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\WareHouseController;

// Controller User
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\WishLisController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;

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

// USER ROUTE
Route::prefix('/user')->name('user.')->group(function () {

    Route::middleware(['guest:user'])->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/login', [HomeController::class, 'login'])->name('login');
        Route::post('/login_handler', [HomeController::class, 'loginHandler']);

        Route::prefix('/categories')->name('categories.')->group(function () {
            Route::get('/{category_id}', [HomeController::class, 'products']);
            Route::get('/productAll', [HomeController::class, 'productAll']);
            Route::get('/{category_id}/{product_id}', [HomeController::class, 'productDetail']);
        });
    });

    Route::middleware(['auth:user'])->group(function () {

        Route::get('/homeAuth', [HomeController::class, 'index'])->name('home');
        Route::post('/logout', [HomeController::class, 'logout']);
        Route::get('/wishlist', [WishLisController::class, 'wishList'])->name('wishlist');
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

        Route::prefix('/categoriesAuth')->name('categories.')->group(function () {
            Route::get('/{category_id}', [HomeController::class, 'products']);
            Route::get('/productAll', [HomeController::class, 'productAll']);
            Route::get('/{category_id}/{product_id}', [HomeController::class, 'productDetail']);
        });

        // Payment online
        Route::post('/online_checkout', [CheckoutPaymentController::class, 'online_checkout']);
        // Route::post('/momo_payment', [CheckoutPaymentController::class, 'momo_payment']);
        Route::get('thank-you', [HomeController::class, 'thankyou']);

        Route::get('orders', [OrderController::class, 'index']);
        Route::get('/orders/{order_id}', [OrderController::class, 'show']);
    });
});

// ADMIN ROUTE
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
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderAdminController::class);
        Route::get('invoice/{orderId}', [OrderAdminController::class, 'viewPDF']);
        Route::get('invoice/{orderId}/generate', [OrderAdminController::class, 'PDF']);
        Route::get('/products/{product_image_id}/deleteImage', [ProductController::class, 'deleteImage']);
        Route::post('products/product_color/{id}', [ProductController::class, 'updateProdColorQty']);
        Route::get('/products/product_color/delete/{id}', [ProductController::class, 'deleteProdColorQty']);
        // Route::resource('colors', ColorController::class);
        Route::resource('sizes', SizeController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('coupons', CouponController::class);
        Route::resource('providers', ProviderController::class);
        Route::post('providers/select_address', [ProviderController::class, 'select_address']);
        Route::post('providers/store', [ProviderController::class, 'store']);

        Route::get('/warehouses/index', [WareHouseController::class, 'index'])->name('warehouses.index');
        Route::get('/warehouses/create', [WareHouseController::class, 'create'])->name('warehouses.show');
        Route::get('/addRowProduct', [WareHouseController::class, 'addRowProduct'])->name('addRowProduct');
        Route::post('/create', [WareHouseController::class, 'store'])->name('warehouses.store');
        Route::get('/edit/{id}', [WareHouseController::class, 'edit'])->name('warehouses.edit');
        Route::post('/edit/{id}', [WareHouseController::class, 'update']);
        // Route::get('/show/{id}', [WareHouseController::class, 'show']);
        Route::post('/destroy', [WareHouseController::class, 'store'])->name('warehouses.destroy');
    });
});
