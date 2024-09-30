<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Store\ShopController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CreditsLevelsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\GalleryController;
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
Route::get('/', [ShopController::class, 'index'])->name('welcome');
Route::get('/services', [ShopController::class, 'shop'])->name('shop');
Route::get('/services/{slug}', [ShopController::class, 'product'])->name('product');
Route::post('cart-store', [ShopController::class, 'cartStore'])->name('cart-store');
Route::post('simple-cart-store', [ShopController::class, 'cartStoreSimple'])->name('simple-cart-store');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::get('/update-cart/{cartItemId}/{newQuantity}', [ShopController::class, 'updateCart'])->name('update.cart');
Route::get('/remove-cart-item/{cartItemId}', [ShopController::class, 'removeCartItem']);
Route::get('checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::get('/gallery', [ShopController::class, 'gallery'])->name('user.gallery');


// User routes
Auth::routes(['verify' => true]);


// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::post('/editAdminProfile', [DashboardController::class, 'editProfile'])->name('admin.editProfile');
        Route::post('/editAdminPassword', [DashboardController::class, 'editPassword'])->name('admin.editPassword');

        Route::get('/partners', [UserManagementController::class, 'index'])->name('admin.users');
        Route::get('/partners-view/{id}', [UserManagementController::class, 'view'])->name('admin.user-view');
        Route::post('/partners-activate', [UserManagementController::class, 'activate'])->name('admin.user-activate');
        Route::post('/partners-deactivate', [UserManagementController::class, 'deactivate'])->name('admin.user-deactivate');
        Route::post('/partners-delete', [UserManagementController::class, 'delete'])->name('admin.user-delete');

        Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
        Route::post('/products-store', [ProductsController::class, 'store'])->name('admin.products-store');
        Route::post('/products-update', [ProductsController::class, 'update'])->name('admin.products-update');
        Route::post('/products-delete', [ProductsController::class, 'delete'])->name('admin.products-delete');

        Route::get('/credits', [CreditsLevelsController::class, 'index'])->name('admin.credits');
        Route::post('/credits-update', [CreditsLevelsController::class, 'update'])->name('admin.credits-update');

        Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders');
        Route::get('/order-details/{order_number}', [OrdersController::class, 'details'])->name('admin.order-details');



        Route::get('/referral_history', [DashboardController::class, 'referral_history'])->name('admin.referral_history');
        Route::put('/referral-status/{id}', [DashboardController::class, 'updateReferralStatus'])->name('admin.update-status');

        Route::get('/leaderboard', [DashboardController::class, 'leaderboard'])->name('admin.leaderboard');

        Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
        Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
        Route::delete('/gallery/delete/{id}', [GalleryController::class, 'deleteImage'])->name('admin.delete.image');
        Route::get('/gallery/view-image/{id}', [GalleryController::class, 'view-image'])->name('admin.gallery.view-image');


    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/referral_history', [App\Http\Controllers\HomeController::class, 'referral_history'])->name('referral_history');
Route::get('/referrals', [App\Http\Controllers\HomeController::class, 'referrals'])->name('referrals');
Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
Route::post('/editProfile', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('editProfile');
Route::post('/editPassword', [App\Http\Controllers\HomeController::class, 'editPassword'])->name('editPassword');
Route::get('show-order/{order_number}', [ShopController::class, 'showOrder'])->name('show.order');

Route::get('/newreferral', [App\Http\Controllers\HomeController::class, 'open_referral'])->name('open_referral');
Route::post('/newreferral', [App\Http\Controllers\HomeController::class, 'generate_referral'])->name('new_referral');


Route::get('/user-leaderboard', [App\Http\Controllers\HomeController::class, 'Userleaderboard'])->name('user_leaderboard');
