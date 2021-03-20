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
Route::get('products/getAll', [ProductController::class, 'getAllProducts']);
Route::post('products/getOne/{id}', [ProductController::class, 'getProduct']);
Route::put('products/{id}', [ProductController::class, 'updateProduct']);
Route::delete('products/id', [ProductController::class, 'deleteProduct']);


Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);

//    Route::resource('order-details', (string)[OrderDetailsController::class]);
//    Route::resource('orders', (string)[OrdersController::class]);
//    Route::resource('supplier-products', (string)[SupplierProductsController::class]);
//    Route::resource('suppliers', (string)[SuppliersController::class]);


});
