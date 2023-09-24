<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CommentAdminController;
use App\Http\Controllers\Admin\DashBoardController;
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
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\Auth\SocialAuthController;
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

Route::get('/home', function () {
    return view('user.home');
});

// USER ROUTE
Route::prefix('/user')->name('user.')->group(function () {

    Route::middleware(['guest:user'])->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/login', [HomeController::class, 'login'])->name('login');
        Route::post('/login_handler', [HomeController::class, 'loginHandler']);

        Route::get('/auth/google/redirect', [SocialAuthController::class, 'googleRedirect'])->name('googleRedirect');
        Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('googleCallback');

        Route::prefix('/categories')->name('categories.')->group(function () {
            Route::get('/{category_id}', [HomeController::class, 'products']);
            Route::get('/{category_id}/{product_id}', [HomeController::class, 'productDetail']);
        });

        Route::get('/searchProductMicrophone', [HomeController::class, 'searchProductMicrophone']);

        Route::get('/blog', function () {
            return view('user.blog');
        });

        Route::post('/comment', [CommentController::class, 'store']);
    });

    Route::middleware(['auth:user'])->group(function () {

        Route::get('/homeAuth', [HomeController::class, 'index'])->name('home');
        Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
        Route::get('/wishlist', [WishLisController::class, 'wishList'])->name('wishlist');
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

        Route::prefix('/categoriesAuth')->name('categories.')->group(function () {
            Route::get('/{category_id}', [HomeController::class, 'products']);
            Route::get('/{category_id}/{product_id}', [HomeController::class, 'productDetail']);
        });
        Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
        // Payment online
        Route::post('/online_checkout', [CheckoutPaymentController::class, 'online_checkout']);
        // Route::post('/momo_payment', [CheckoutPaymentController::class, 'momo_payment']);
        Route::get('thank-you', [HomeController::class, 'thankyou']);
        Route::get('/search', [HomeController::class, 'searchProduct']);
        // Route::get('/search-form', [HomeController::class, 'searchMicrophone']);
        Route::get('/searchProductMicrophoneAuth', [HomeController::class, 'searchProductMicrophone']);
        Route::get('/profile', [HomeController::class, 'profile']);
        Route::get('/profile/createAddress', [HomeController::class, 'createAddress']);
        Route::post('/profile/addAddress', [HomeController::class, 'addAddress']);
        Route::get('/profile/updateAddress/{address_id}', [HomeController::class, 'updateAddress']);
        Route::post('/profile/editAddress/{address_id}', [HomeController::class, 'editAddress']);
        Route::post('profile/select_address', [HomeController::class, 'select_address']);

        Route::get('/profile/orderDetail/{order_id}', [HomeController::class, 'orderDetail']);
        Route::get('/order/cancle/{order_id}', [HomeController::class, 'cancleOrder']);
        Route::post('/changePassword', [HomeController::class, 'changePassword']);
        // Route::get('/addAddress', [HomeController::class, 'addAddress']);

        Route::get('orders', [OrderController::class, 'index']);
        Route::get('/orders/{order_id}', [OrderController::class, 'show']);

        Route::post('/commentAuth', [CommentController::class, 'store']);
        Route::post('/commentAuth/reply', [CommentController::class, 'postReply'])->name('commentAuth.reply');
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
        Route::get('/dashboard', [AdminController::class, 'dashBoard'])->name('dashboard');
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
        Route::resource('accounts', AccountController::class);
        Route::resource('comments', CommentAdminController::class);
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
        Route::post('/warehouses/product_add/{id}', [WareHouseController::class, 'addProductWarehouse'])->name('warehouses.addProductWarehouse');

        Route::get('/addRowProduct', [WareHouseController::class, 'addRowProduct'])->name('addRowProduct');
        Route::post('/create', [WareHouseController::class, 'store'])->name('warehouses.store');
        Route::get('/edit/{id}', [WareHouseController::class, 'edit'])->name('warehouses.edit');
        Route::post('/edit/{id}', [WareHouseController::class, 'update']);
        // Route::get('/show/{id}', [WareHouseController::class, 'show']);
        Route::post('/destroy', [WareHouseController::class, 'store'])->name('warehouses.destroy');

        // Thong ke
        Route::post('/days-order',[DashBoardController::class,'days_order']);
        Route::post('/dashboard-filter',[DashBoardController::class,'dashboard_filter']);
        Route::post('/filter-by-date',[DashBoardController::class,'filter_by_date']);
    });
});
