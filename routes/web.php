<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\DeshboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\Brand;
use App\Models\SubCategory;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(MyCommerceController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/product-category/{id}', 'category')->name('product.category');
    Route::get('/product-subCategory/{id}', 'subCategory')->name('product.subCategory');
    Route::get('/product-detail/{id}', 'details')->name('product.detail');
});
Route::controller(CartController::class)->group(function () {
    Route::post('/add-to-cart', 'index')->name('add-to-cart');
    Route::get('/show-cart', 'show')->name('show.cart');
    Route::get('/remove-cart-product/{id}', 'remove')->name('remove-cart-product');
    Route::post('/uadate-cart-product/{id}', 'update')->name('uadate-cart-product');
});
Route::controller(CheckOutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout');
    Route::post('/new-cash-order', 'newCashOrder')->name('new-cash-order');
});
Route::controller(CustomerAuthController::class)->group(function () {
    Route::get('/customer-register', 'register')->name('customer.register');
    Route::post('/customer-register', 'registerDone')->name('customer.register');
    Route::get('/customer-login', 'index')->name('customer.login');
    Route::post('/customer-login', 'login')->name('customer.login');

    Route::middleware('customer')->group(function () {
        Route::get('/customer-logout', 'logout')->name('customer.logout');
        Route::get('/customer-dashboard', 'dashboard')->name('customer.dashboard');
        Route::get('/customer-profile', 'profile')->name('customer.profile');
        Route::controller(CustomerOrderController::class)->group(function () {
            Route::get('/customer-order', 'order')->name('customer.order');
        });
    });
});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::get('/dashboard', [DeshboardController::class, 'index'])->name('dashboard');



    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/add/final', [CategoryController::class, 'addCategory'])->name('category.add.final');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('status');
    Route::post('/category/detele', [CategoryController::class, 'delete'])->name('delete');
    Route::post('/category/edit', [CategoryController::class, 'edit'])->name('edit');


    Route::get('/sub-category/add', [SubCategoryController::class, 'index'])->name('subCategory.add');
    Route::post('/sub-category/add/final', [SubCategoryController::class, 'addSubCategory'])->name('subCategory.add.final');
    Route::get('/sub-category/manage', [SubCategoryController::class, 'manage'])->name('subCategory.manage');
    Route::post('/sub-category/detele', [SubCategoryController::class, 'delete'])->name('subCategory.delete');
    Route::post('/sub-category/edit', [SubCategoryController::class, 'edit'])->name('subCategory.edit');



    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/add/final', [BrandController::class, 'addBrand'])->name('brand.add.final');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::post('/brand/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/detele', [BrandController::class, 'delete'])->name('brand.delete');


    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/unit/add/final', [UnitController::class, 'addUnit'])->name('unit.add.final');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');
    Route::post('/unit/edit', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/detele', [UnitController::class, 'delete'])->name('unit.delete');


    Route::get('/product/add', [ProductController::class, 'index'])->name('product.add');
    Route::get('/product/subcategory/category', [ProductController::class, 'subcategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::post('/product/save', [ProductController::class, 'addProduct'])->name('product.save');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::post('/product/Edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/details', [ProductController::class, 'details'])->name('product.details');
    Route::post('/product/delete', [ProductController::class, 'details_item'])->name('product.delete');
    Route::controller(AdminOrderController::class)->group(function(){
        Route::get('/admin/all-order','index')->name('admin.all-order');
    });
});
