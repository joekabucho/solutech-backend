<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\SuppliersController;
use App\Http\Controllers\API\OrderDetailsController;
use App\Http\Controllers\API\SupplierProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);


Route::post('products', [ProductController::class, 'createProduct']);
Route::get('products', [ProductController::class, 'getAllProducts']);
Route::get('products/{id}', [ProductController::class, 'getProduct']);
Route::put('products/{id}', [ProductController::class, 'updateProduct']);
Route::delete('products/{id}', [ProductController::class, 'deleteProduct']);


Route::post('orderdetails', [OrderDetailsController::class, 'createOrderDetails']);
Route::get('orderdetails', [OrderDetailsController::class, 'getAllOrderDetails']);
Route::get('orderdetails/{id}', [OrderDetailsController::class, 'getOrderDetail']);
Route::put('orderdetails/{id}', [OrderDetailsController::class, 'updateOrderDetails']);
Route::delete('orderdetails/{id}', [OrderDetailsController::class, 'deleteOrderDetails']);

Route::post('orders', [OrdersController::class, 'createOrders']);
Route::get('orders', [OrdersController::class, 'getAllOrders']);
Route::get('orders/{id}', [OrdersController::class, 'getOrder']);
Route::put('orders/{id}', [OrdersController::class, 'updateOrders']);
Route::delete('orders/{id}', [OrdersController::class, 'deleteOrders']);

Route::post('suppliers', [SuppliersController::class, 'createSuppliers']);
Route::get('suppliers', [SuppliersController::class, 'getAllSupplier']);
Route::get('suppliers/{id}', [SuppliersController::class, 'getSupplier']);
Route::put('suppliers/{id}', [SuppliersController::class, 'updateSupplier']);
Route::delete('suppliers/{id}', [SuppliersController::class, 'deleteSuppliers']);

Route::post('supplierproducts', [SupplierProductsController::class, 'createSupplierProducts']);
Route::get('supplierproducts', [SupplierProductsController::class, 'getAllSupplierProducts']);
Route::get('supplierproducts/{id}', [SupplierProductsController::class, 'getSupplierProduct']);
Route::put('supplierproducts/{id}', [SupplierProductsController::class, 'updateSupplierProducts']);
Route::delete('supplierproducts/{id}', [SupplierProductsController::class, 'deleteSupplierProducts']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);

//    Route::resource('order-details', (string)[OrderDetailsController::class]);
//    Route::resource('orders', (string)[OrdersController::class]);
//    Route::resource('supplier-products', (string)[SupplierProductsController::class]);
//    Route::resource('suppliers', (string)[SuppliersController::class]);


});
