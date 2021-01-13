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

//Index
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


//Show
Route::get('/category/{id}', 'CategoryController@show');
Route::get('/commune/{id}', 'CommuneController@show');
Route::get('/deliveryOrder/{id}', 'DeliveryOrderController@show');
Route::get('/deliveryOrderPurchaseOrder/{id}', 'DeliveryOrderPurchaseOrderController@show');
Route::get('/fair/{id}', 'FairController@show');
Route::get('/numberAddress/{id}', 'NumberAddressController@show');
Route::get('/paymentMethod/{id}', 'PaymentMethodController@show');
Route::get('/paymentMethodUser/{id}', 'PaymentMethodUserController@show');
Route::get('/permission/{id}', 'PermissionController@show');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/productStall/{id}', 'ProductStallController@show');
Route::get('/productUnitOfMeasure/{id}', 'ProductUnitOfMeasureController@show');
Route::get('/purchaseOrder/{id}', 'PurchaseOrderController@show');
Route::get('/purchaseOrderProduct/{id}', 'PurchaseOrderProductController@show');
Route::get('/region/{id}', 'RegionController@show');
Route::get('/role/{id}', 'RoleController@show');
Route::get('/rolePermission/{id}', 'RolePermissionController@show');
Route::get('/stall/{id}', 'StallController@show');
Route::get('/streetAddress/{id}', 'StreetAddressController@show');
Route::get('/subCategory/{id}', 'SubCategoryController@show');
Route::get('/unitOfMeasure/{id}', 'UnitOfMeasureController@show');
Route::get('/user/{id}', 'UserController@show');
Route::get('/userStall/{id}', 'UserStallController@show');

//Store
Route::post('/category/create', 'CategoryController@store');
Route::post('/commune/create', 'CommuneController@store');
Route::post('/deliveryOrder/create', 'DeliveryOrderController@store');
Route::post('/deliveryOrderPurchaseOrder/create', 'DeliveryOrderPurchaseOrderController@store');
Route::post('/fair/create', 'FairController@store');
Route::post('/numberAddress/create', 'NumberAddressController@store');
Route::post('/paymentMethod/create', 'PaymentMethodController@store');
Route::post('/paymentMethodUser/create', 'PaymentMethodUserController@store');
Route::post('/permission/create', 'PermissionController@store');
Route::post('/product/create', 'ProductController@store');
Route::post('/productStall/create', 'ProductStallController@store');
Route::post('/productUnitOfMeasure/create', 'ProductUnitOfMeasureController@store');
Route::post('/purchaseOrder/create', 'PurchaseOrderController@store');
Route::post('/purchaseOrderProduct/create', 'PurchaseOrderProductController@store');
Route::post('/region/create', 'RegionController@store');
Route::post('/role/create', 'RoleController@store');
Route::post('/rolePermission/create', 'RolePermissionController@store');
Route::post('/stall/create', 'StallController@store');
Route::post('/streetAddress/create', 'StreetAddressController@store');
Route::post('/subCategory/create', 'SubCategoryController@store');
Route::post('/unitOfMeasure/create', 'UnitOfMeasureController@store');
Route::post('/user/create', 'UserController@store');
Route::post('/userStall/create', 'UserStallController@store');

//UPDATE
Route::put('category/update/{id}', 'CategoryController@update');
Route::put('commune/update/{id}', 'CommuneController@update');
Route::put('deliveryOrder/update/{id}', 'DeliveryOrderController@update');
Route::put('deliveryOrderPurchaseOrder/update/{id}', 'DeliveryOrderPurchaseOrderController@update');
Route::put('fair/update/{id}', 'FairController@update');
Route::put('numberAddress/update/{id}', 'NumberAddressController@update');
Route::put('paymentMethod/update/{id}', 'PaymentMethodController@update');
Route::put('paymentMethodUser/update/{id}', 'PaymentMethodUserController@update');
Route::put('permission/update/{id}', 'PermissionController@update');
Route::put('product/update/{id}', 'ProductController@update');
Route::put('productStall/update/{id}', 'ProductStallController@update');
Route::put('productUnitOfMeasure/update/{id}', 'ProductUnitOfMeasureController@update');
Route::put('purchaseOrder/update/{id}', 'PurchaseOrderController@update');
Route::put('purchaseOrderProduct/update/{id}', 'PurchaseOrderProductController@update');
Route::put('region/update/{id}', 'RegionController@update');
Route::put('role/update/{id}', 'RoleController@update');
Route::put('rolePermission/update/{id}', 'RolePermissionController@update');
Route::put('stall/update/{id}', 'StallController@update');
Route::put('streetAddress/update/{id}', 'StreetAddressController@update');
Route::put('subCategory/update/{id}', 'SubCategoryController@update');
Route::put('unitOfMeasure/update/{id}', 'UnitOfMeasureController@update');
Route::put('user/update/{id}', 'UserController@update');
Route::put('userStall/update/{id}', 'UserStallController@update');

//Destroy
Route::get('category/delete/{id}', 'CategoryController@delete');
Route::get('commune/delete/{id}', 'CommuneController@delete');
Route::get('deliveryOrder/delete/{id}', 'DeliveryOrderController@delete');
Route::get('deliveryOrderPurchaseOrder/delete/{id}', 'DeliveryOrderPurchaseOrderController@delete');
Route::get('fair/delete/{id}', 'FairController@delete');
Route::get('numberAddress/delete/{id}', 'NumberAddressController@delete');
Route::get('paymentMethod/delete/{id}', 'PaymentMethodController@delete');
Route::get('paymentMethodUser/delete/{id}', 'PaymentMethodUserController@delete');
Route::get('permission/delete/{id}', 'PermissionController@delete');
Route::get('product/delete/{id}', 'ProductController@delete');
Route::get('productStall/delete/{id}', 'ProductStallController@delete');
Route::get('productUnitOfMeasure/delete/{id}', 'ProductUnitOfMeasureController@delete');
Route::get('purchaseOrder/delete/{id}', 'PurchaseOrderController@delete');
Route::get('purchaseOrderProduct/delete/{id}', 'PurchaseOrderProductController@delete');
Route::get('region/delete/{id}', 'RegionController@delete');
Route::get('role/delete/{id}', 'RoleController@delete');
Route::get('rolePermission/delete/{id}', 'RolePermissionController@delete');
Route::get('stall/delete/{id}', 'StallController@delete');
Route::get('streetAddress/delete/{id}', 'StreetAddressController@delete');
Route::get('subCategory/delete/{id}', 'SubCategoryController@delete');
Route::get('unitOfMeasure/delete/{id}', 'UnitOfMeasureController@delete');
Route::get('user/delete/{id}', 'UserController@delete');
Route::get('userStall/delete/{id}', 'UserStallController@delete');