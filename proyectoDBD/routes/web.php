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

//Category
Route::get('/category', 'CategoryController@index');
Route::get('/category', 'CategoryController@show');
Route::post('/category', 'CategoryController@store');
Route::put('/category', 'CategoryController@update');
Route::delete('/category', 'CategoryController@delete');

//Commune
Route::get('/commune', 'CommuneController@index');
Route::get('/commune', 'CommuneController@show');
Route::post('/commune', 'CommuneController@store');
Route::put('/commune', 'CommuneController@update');
Route::delete('/commune', 'CommuneController@delete');

//DeliveryOrder
Route::get('/deliveryOrder', 'DeliveryOrderController@index');
Route::get('/deliveryOrder', 'DeliveryOrderController@show');
Route::post('/deliveryOrder', 'DeliveryOrderController@store');
Route::put('/deliveryOrder', 'DeliveryOrderController@update');
Route::delete('/deliveryOrder', 'DeliveryOrderController@delete');

//DeliveryOrderPurchaseOrder
Route::get('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@index');
Route::get('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@show');
Route::post('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@store');
Route::put('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@update');
Route::delete('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@delete');

//Fair
Route::get('/fair', 'FairController@index');
Route::get('/fair', 'FairController@show');
Route::post('/fair', 'FairController@store');
Route::put('/fair', 'FairController@update');
Route::delete('/fair', 'FairController@delete');

//NumberAddress
Route::get('/numberAddress', 'NumberAddressController@index');
Route::get('/numberAddress', 'NumberAddressController@show');
Route::post('/numberAddress', 'NumberAddressController@store');
Route::put('/numberAddress', 'NumberAddressController@update');
Route::delete('/numberAddress', 'NumberAddressController@delete');

//PaymentMethod
Route::get('/paymentMethod', 'PaymentMethodController@index');
Route::get('/paymentMethod', 'PaymentMethodController@show');
Route::post('/paymentMethod', 'PaymentMethodController@store');
Route::put('/paymentMethod', 'PaymentMethodController@update');
Route::delete('/paymentMethod', 'PaymentMethodController@delete');

//PaymentMethodUser
Route::get('/paymentMethodUser', 'PaymentMethodUserController@index');
Route::get('/paymentMethodUser', 'PaymentMethodUserController@show');
Route::post('/paymentMethodUser', 'PaymentMethodUserController@store');
Route::put('/paymentMethodUser', 'PaymentMethodUserController@update');
Route::delete('/paymentMethodUser', 'PaymentMethodUserController@delete');

//Permission
Route::get('/permission', 'PermissionController@index');
Route::get('/permission', 'PermissionController@show');
Route::post('/permission', 'PermissionController@store');
Route::put('/permission', 'PermissionController@update');
Route::delete('/permission', 'PermissionController@delete');

//Product
Route::get('/product', 'ProductController@index');
Route::get('/product', 'ProductController@show');
Route::post('/product', 'ProductController@store');
Route::put('/product', 'ProductController@update');
Route::delete('/product', 'ProductController@delete');

//Product
Route::get('/productStall', 'ProductStallController@index');
Route::get('/productStall', 'ProductStallController@show');
Route::post('/productStall', 'ProductStallController@store');
Route::put('/productStall', 'ProductStallController@update');
Route::delete('/productStall', 'ProductStallController@delete');

//ProductUnitOfMeasure
Route::get('/productUnitOfMeasure', 'ProductUnitOfMeasureController@index');
Route::get('/productUnitOfMeasure', 'ProductUnitOfMeasureController@show');
Route::post('/productUnitOfMeasure', 'ProductUnitOfMeasureController@store');
Route::put('/productUnitOfMeasure', 'ProductUnitOfMeasureController@update');
Route::delete('/productUnitOfMeasure', 'ProductUnitOfMeasureController@delete');

//PurchaseOrder
Route::get('/purchaseOrder', 'PurchaseOrderController@index');
Route::get('/purchaseOrder', 'PurchaseOrderController@show');
Route::post('/purchaseOrder', 'PurchaseOrderController@store');
Route::put('/purchaseOrder', 'PurchaseOrderController@update');
Route::delete('/purchaseOrder', 'PurchaseOrderController@delete');

//PurchaseOrderProduct
Route::get('/purchaseOrderProduct', 'PurchaseOrderProductController@index');
Route::get('/purchaseOrderProduct', 'PurchaseOrderProductController@show');
Route::post('/purchaseOrderProduct', 'PurchaseOrderProductController@store');
Route::put('/purchaseOrderProduct', 'PurchaseOrderProductController@update');
Route::delete('/purchaseOrderProduct', 'PurchaseOrderProductController@delete');

//Region
Route::get('/region', 'RegionController@index');
Route::get('/region', 'RegionController@show');
Route::post('/region', 'RegionController@store');
Route::put('/region', 'RegionController@update');
Route::delete('/region', 'RegionController@delete');

//Role
Route::get('/role', 'RoleController@index');
Route::get('/role', 'RoleController@show');
Route::post('/role', 'RoleController@store');
Route::put('/role', 'RoleController@update');
Route::delete('/role', 'RoleController@delete');

//RolePermission
Route::get('/rolePermission', 'RolePermissionController@index');
Route::get('/rolePermission', 'RolePermissionController@show');
Route::post('/rolePermission', 'RolePermissionController@store');
Route::put('/rolePermission', 'RolePermissionController@update');
Route::delete('/rolePermission', 'RolePermissionController@delete');

//Stall
Route::get('/stall', 'StallController@index');
Route::get('/stall', 'StallController@show');
Route::post('/stall', 'StallController@store');
Route::put('/stall', 'StallController@update');
Route::delete('/stall', 'StallController@delete');

//StreetAddress
Route::get('/streetAddress', 'StreetAddressController@index');
Route::get('/streetAddress', 'StreetAddressController@show');
Route::post('/streetAddress', 'StreetAddressController@store');
Route::put('/streetAddress', 'StreetAddressController@update');
Route::delete('/streetAddress', 'StreetAddressController@delete');

//SubCategory
Route::get('/subCategory', 'SubCategoryController@index');
Route::get('/subCategory', 'SubCategoryController@show');
Route::post('/subCategory', 'SubCategoryController@store');
Route::put('/subCategory', 'SubCategoryController@update');
Route::delete('/subCategory', 'SubCategoryController@delete');

//UnitOfMeasure
Route::get('/unitOfMeasure', 'UnitOfMeasureController@index');
Route::get('/unitOfMeasure', 'UnitOfMeasureController@show');
Route::post('/unitOfMeasure', 'UnitOfMeasureController@store');
Route::put('/unitOfMeasure', 'UnitOfMeasureController@update');
Route::delete('/unitOfMeasure', 'UnitOfMeasureController@delete');

//User
Route::get('/user', 'UserController@index');
Route::get('/user', 'UserController@show');
Route::post('/user', 'UserController@store');
Route::put('/user', 'UserController@update');
Route::delete('/user', 'UserController@delete');

//UserStall
Route::get('/userStall', 'UserStallController@index');
Route::get('/userStall', 'UserStallController@show');
Route::post('/userStall', 'UserStallController@store');
Route::put('/userStall', 'UserStallController@update');
Route::delete('/userStall', 'UserStallController@delete');