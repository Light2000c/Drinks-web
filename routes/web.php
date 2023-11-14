<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\Categorycontroller;
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
use App\Http\Controllers\payment\ConfirmPaymentController;
use App\Http\Controllers\payment\PaymentController;
use App\Http\Controllers\product\CartController as ProductCartController;
use App\Http\Controllers\product\CheckoutController;
use App\Http\Controllers\product\ProductDetailController as ProductProductDetailController;
use App\Http\Controllers\product\ShopController;
use App\Http\Controllers\profile\AccountController as ProfileAccountController;
use App\Http\Controllers\profile\AddAddressController;
use App\Http\Controllers\profile\AddressController;
use App\Http\Controllers\profile\DeliveryTypeController;
use App\Http\Controllers\profile\EditAddressController;
use App\Http\Controllers\profile\EditProfileController;
use App\Http\Controllers\profile\OrderController as ProfileOrderController;
use App\Http\Controllers\profile\OrderDetailsController;
use App\Http\Controllers\profile\WishlistController as ProfileWishlistController;

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
Route::post('/login', [AuthLoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);


//Product Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::post('/shop', [ShopController::class, 'reDirect']);

Route::get('/products/{product}', [ProductProductDetailController::class, 'index'])->name('product-details');

Route::get('/cart', [ProductCartController::class, 'index'])->name('cart');
Route::post('/cart/{product}', [ProductCartController::class, 'store'])->name('add-cart');
Route::delete('/cart/{product}', [ProductCartController::class, 'destroy'])->name('delete-cart');




//Profile Routes
Route::get('/profile/account', [ProfileAccountController::class, 'index'])->name('account');

Route::get('/profile/account/edit-profile', [EditProfileController::class, 'index'])->name('edit-profile');
Route::put('/profile/account/edit-profile', [EditProfileController::class, 'update']);

Route::get('profile/delivery-type', [DeliveryTypeController::class, 'index'])->name('delivery-type');
Route::put('profile/delivery-type', [DeliveryTypeController::class, 'update']);

Route::get('/profile/order', [ProfileOrderController::class, 'index'])->name('profile-order');
Route::get('/prifile/order/{order}', [OrderDetailsController::class, 'index'])->name('order-details');

Route::get('profile/wishlist', [ProfileWishlistController::class, 'index'])->name('profile-wishlist');

Route::get('profile/address', [AddressController::class, 'index'])->name('profile-address');
Route::put('profile/address/{address}', [AddressController::class, 'update'])->name('profile-update-address');
Route::delete('profile/address/{address}', [AddressController::class, 'destroy'])->name('profile-delete-address');


Route::get('profile/add-address', [AddAddressController::class, 'index'])->name('profile-add-address');
Route::post('profile/add-address', [AddAddressController::class, 'store']);

Route::get('profile/edit-address/{address}', [EditAddressController::class, 'index'])->name('profile-edit-address');
Route::put('profile/edit-address/{address}', [EditAddressController::class, 'update']);




//Payment Controllers
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('checkout/payment', [ConfirmPaymentController::class, 'index'])->name('confirm-order');

Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


// Admin Routes

Route::get('/admin/login', [LoginController::class, 'index'])->name('admin-login');
Route::post('/admin/login', [LoginController::class, 'login']);

Route::middleware(['is_admin'])->group(function() {

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin-product');
Route::post('/admin/products', [ProductController::class, 'store']);
Route::delete('/admin/products/{product}', [ProductController::class, 'delete'])->name('admin-product-delete');

Route::get('/admin/products/details/{product}', [ProductDetailController::class, 'index'])->name('admin-product-details');
Route::put('/admin/products/details/{product}', [ProductDetailController::class, 'update']);

Route::get('/admin/carts', [CartController::class, 'index'])->name('admin-cart');
Route::delete('/admin/carts/{cart}', [CartController::class, 'destroy'])->name('admin-delete-cart');

Route::get('admin/category', [Categorycontroller::class, 'index'])->name('admin-category');
Route::post('admin/category', [Categorycontroller::class, 'store']);
Route::delete('admin/category/{category}', [Categorycontroller::class, 'destroy'])->name('admin-category-delete');

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin-order');
Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('admin-delete-order');

Route::get('/admin/accounts', [AccountController::class, 'index'])->name('admin-account');

Route::get('/admin/team-members', [TeamMemberController::class, 'index'])->name('admin-team-member');

Route::get('/admin/wishlists', [WishlistController::class, 'index'])->name('admin-wishlist');

Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin-transaction');

Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin-setting');

});