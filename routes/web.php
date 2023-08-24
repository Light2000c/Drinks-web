<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admin\WishlistController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TeamMemberController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\ProductDetailController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\product\ProductDetailController as ProductProductDetailController;
use App\Http\Controllers\product\ShopController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/login', [AuthLoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');


//Product Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/product-detail', [ProductProductDetailController::class, 'index'])->name('product-details');


// Admin Routes
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin-product');

Route::get('/admin/product-details', [ProductDetailController::class, 'index'])->name('admin-product-details');

Route::get('/admin/carts', [CartController::class, 'index'])->name('admin-cart');

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin-order');

Route::get('/admin/accounts', [AccountController::class, 'index'])->name('admin-account');

Route::get('/admin/team-members', [TeamMemberController::class, 'index'])->name('admin-team-member');

Route::get('/admin/wishlists', [WishlistController::class, 'index'])->name('admin-wishlist');

Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin-transaction');

Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin-setting');

Route::get('/admin/login', [LoginController::class, 'index'])->name('admin-login');