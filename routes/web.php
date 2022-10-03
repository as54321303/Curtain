<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MoneyController;
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

/*
| -------------------------------------------------------------------------
| ADMIN ROUTES
| -------------------------------------------------------------------------
*/

// GET Request
Route::get('admin/admin', function () {
    return view('admin.login');
})->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// GET Request : PROTECTED With Middleware
Route::get('admin', function () {
    return view('admin.admin');
})->name('admin.home')->middleware('webguard');
Route::get('admin/products/addProduct', [AdminController::class, 'add_product_page'])->name('admin.add.product')->middleware('webguard');
Route::get('admin/products', [AdminController::class, 'index'])->name('admin.products')->middleware('webguard');
Route::get('admin/products/show/{id}', [AdminController::class, 'show'])->name('product.show')->middleware('webguard');

// POST Request
Route::post('admin', [AdminController::class, 'auth'])->name('admin.dashboard');
// POST Request : PROTECTED With Middleware
Route::post('admin/addproduct', [AdminController::class, 'store'])->name('add.product')->middleware('webguard');
Route::post('admin/updateproduct', [AdminController::class, 'update_product'])->name('update.product')->middleware('webguard');
Route::post('admin/addimage', [AdminController::class, 'add_image'])->name('add.image')->middleware('webguard');
Route::post('admin/addcolor', [AdminController::class, 'add_color'])->name('add.color')->middleware('webguard');
Route::post('admin/addfabric', [AdminController::class, 'add_fabric'])->name('add.fabric')->middleware('webguard');

// DELETE Request : PROTECTED With Middleware
Route::delete('product/delete/{id}', [AdminController::class, 'delete_product'])->middleware('webguard');
Route::delete('image/delete/{id}', [AdminController::class, 'delete_image'])->middleware('webguard');


/*
| -------------------------------------------------------------------------
| CUSTOMERS ROUTES
| -------------------------------------------------------------------------
*/ 
// GET Request
Route::get('/', [UserController::class, 'set_session'])->name('guest.session');
Route::get('/curtains', [MainController::class, 'index'])->name('customer.welcome');
Route::get('login', [UserController::class, 'auth'])->name('customers.login');
Route::get('signup', [UserController::class, 'signup'])->name('customers.signup');
Route::get('aboutus', [MainController::class, 'aboutus'])->name('customers.aboutus');
Route::get('contactus', [MainController::class, 'contactus'])->name('customers.contactus');
Route::get('cart/value', [CartController::class, 'cart_value'])->name('cart.value');
Route::get('view/product/{id}', [MainController::class, 'show'])->name('customers.product');
Route::get('cart', [CartController::class, 'show_cart'])->name('customers.cart');
Route::get('myorder', [CartController::class, 'my_order'])->name('customers.myorders')->middleware('guard');
Route::get('product/price', [ProductController::class, 'calculate'])->name('calculate.price');

Route::group(['middleware'=>['userauth']],function(){

    Route::get('checkout', [MainController::class, 'show_checkout'])->name('customers.checkout');
    Route::get('logout', [UserController::class, 'logout'])->name('customers.logout');
    Route::post('payment', [MoneyController::class, 'payment'])->name('customers.payment');

    Route::get('checkout/card', [MoneyController::class, 'checkout_session'])->name('checkout.session');
    Route::get('stripecardpay', [MoneyController::class, 'cardpay'])->name('customers.cardpay');

});



Route::delete('cart/remove/{id}', [CartController::class, 'removefrom_cart'])->name('removefrom.cart');

Route::get('imdt', [MoneyController::class, 'imdt'])->name('imdt.process');

// POST Request
Route::post('signup', [UserController::class, 'create_account'])->name('customers.create.account');
Route::post('login', [UserController::class, 'login'])->name('customers.login');


/*
| -------------------------------------------------------------------------
| FOR TESTING PURPOSE
| -------------------------------------------------------------------------
*/
Route::get('testfile', function() {
    return view('testfile');
});
Route::get('t2', function() {
    return view('t2');
});