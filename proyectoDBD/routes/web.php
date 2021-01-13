<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Route::get('/category', 'CategoryController@index');
Route::get('/category', 'CategoryController@index');
Route::get('/commune', 'CommuneController@index');
Route::get('/deliveryOrder', 'DeliveryOrderController@index');
Route::get('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@index');
Route::get('/fair', 'FairController@index');
Route::get('/numberAddress', 'NumberAddressController@index');
Route::get('/paymentMethod', 'PaymentMethodController@index');
Route::get('/paymentMethodUser', 'PaymentMethodUserController@index');
Route::get('/permission', 'PermissionController@index');
Route::get('/product', 'ProductController@index');
Route::get('/productStall', 'ProductStallController@index');
Route::get('/productUnitOfMeasure', 'ProductUnitOfMeasureController@index');
Route::get('/purchaseOrder', 'PurchaseOrderController@index');
Route::get('/purchaseOrderProduct', 'PurchaseOrderProductController@index');
Route::get('/region', 'RegionController@index');
Route::get('/role', 'RoleController@index');
Route::get('/rolePermission', 'RolePermissionController@index');
Route::get('/stall', 'StallController@index');
Route::get('/streetAddress', 'StreetAddressController@index');
Route::get('/subCategory', 'SubCategoryController@index');
Route::get('/unitOfMeasure', 'UnitOfMeasureController@index');
Route::get('/user', 'UserController@index');
Route::get('/userStall', 'UserStallController@index');