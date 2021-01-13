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
Route::get('/category/{id}', 'CategoryController@show');
Route::post('/category/create', 'CategoryController@store');
Route::put('category/update/{id}', 'CategoryController@update');
Route::get('category/delete/{id}', 'CategoryController@delete');

//Commune
Route::get('/commune', 'CommuneController@index');
Route::get('/commune/{id}', 'CommuneController@show');
Route::post('/commune/create', 'CommuneController@store');
Route::put('commune/update/{id}', 'CommuneController@update');
Route::get('commune/delete/{id}', 'CommuneController@delete');

//DeliveryOrder
Route::get('/deliveryOrder', 'DeliveryOrderController@index');
Route::get('/deliveryOrder/{id}', 'DeliveryOrderController@show');
Route::post('/deliveryOrder/create', 'DeliveryOrderController@store');
Route::put('deliveryOrder/update/{id}', 'DeliveryOrderController@update');
Route::get('deliveryOrder/delete/{id}', 'DeliveryOrderController@delete');

//DeliveryOrderPurchaseOrder
Route::get('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@index');
Route::get('/deliveryOrderPurchaseOrder/{id}', 'DeliveryOrderPurchaseOrderController@show');
Route::post('/deliveryOrderPurchaseOrder/create', 'DeliveryOrderPurchaseOrderController@store');
Route::put('deliveryOrderPurchaseOrder/update/{id}', 'DeliveryOrderPurchaseOrderController@update');
Route::get('deliveryOrderPurchaseOrder/delete/{id}', 'DeliveryOrderPurchaseOrderController@delete');

//Fair
Route::get('/fair', 'FairController@index');
Route::get('/fair/{id}', 'FairController@show');
Route::post('/fair/create', 'FairController@store');
Route::put('fair/update/{id}', 'FairController@update');
Route::get('fair/delete/{id}', 'FairController@delete');

//NumberAddress
Route::get('/numberAddress', 'NumberAddressController@index');
Route::get('/numberAddress/{id}', 'NumberAddressController@show');
Route::post('/numberAddress/create', 'NumberAddressController@store');
Route::put('numberAddress/update/{id}', 'NumberAddressController@update');
Route::get('numberAddress/delete/{id}', 'NumberAddressController@delete');

//PaymentMethod
Route::get('/paymentMethod', 'PaymentMethodController@index');
Route::get('/paymentMethod/{id}', 'PaymentMethodController@show');
Route::post('/paymentMethod/create', 'PaymentMethodController@store');
Route::put('paymentMethod/update/{id}', 'PaymentMethodController@update');
Route::get('paymentMethod/delete/{id}', 'PaymentMethodController@delete');

//PaymentMethodUser
Route::get('/paymentMethodUser', 'PaymentMethodUserController@index');
Route::get('/paymentMethodUser/{id}', 'PaymentMethodUserController@show');
Route::post('/paymentMethodUser/create', 'PaymentMethodUserController@store');
Route::put('paymentMethodUser/update/{id}', 'PaymentMethodUserController@update');
Route::get('paymentMethodUser/delete/{id}', 'PaymentMethodUserController@delete');

//Permission
Route::get('/permission', 'PermissionController@index');
Route::get('/permission/{id}', 'PermissionController@show');
Route::post('/permission/create', 'PermissionController@store');
Route::put('permission/update/{id}', 'PermissionController@update');
Route::get('permission/delete/{id}', 'PermissionController@delete');

//Product
Route::get('/product', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product/create', 'ProductController@store');
Route::put('product/update/{id}', 'ProductController@update');
Route::get('product/delete/{id}', 'ProductController@delete');

//ProductStall
Route::get('/productStall', 'ProductStallController@index');
Route::get('/productStall/{id}', 'ProductStallController@show');
Route::post('/productStall/create', 'ProductStallController@store');
Route::put('productStall/update/{id}', 'ProductStallController@update');
Route::get('productStall/delete/{id}', 'ProductStallController@delete');

//ProductUnitOfMeasure
Route::get('/productUnitOfMeasure', 'ProductUnitOfMeasureController@index');
Route::get('/productUnitOfMeasure/{id}', 'ProductUnitOfMeasureController@show');
Route::post('/productUnitOfMeasure/create', 'ProductUnitOfMeasureController@store');
Route::put('productUnitOfMeasure/update/{id}', 'ProductUnitOfMeasureController@update');
Route::get('productUnitOfMeasure/delete/{id}', 'ProductUnitOfMeasureController@delete');

//PurchaseOrder
Route::get('/purchaseOrder', 'PurchaseOrderController@index');
Route::get('/purchaseOrder/{id}', 'PurchaseOrderController@show');
Route::post('/purchaseOrder/create', 'PurchaseOrderController@store');
Route::put('purchaseOrder/update/{id}', 'PurchaseOrderController@update');
Route::get('purchaseOrder/delete/{id}', 'PurchaseOrderController@delete');

//PurchaseOrderProduct
Route::get('/purchaseOrderProduct', 'PurchaseOrderProductController@index');
Route::get('/purchaseOrderProduct/{id}', 'PurchaseOrderProductController@show');
Route::post('/purchaseOrderProduct/create', 'PurchaseOrderProductController@store');
Route::put('purchaseOrderProduct/update/{id}', 'PurchaseOrderProductController@update');
Route::get('purchaseOrderProduct/delete/{id}', 'PurchaseOrderProductController@delete');

//Region
Route::get('/region', 'RegionController@index');
Route::get('/region/{id}', 'RegionController@show');
Route::post('/region/create', 'RegionController@store');
Route::put('region/update/{id}', 'RegionController@update');
Route::get('region/delete/{id}', 'RegionController@delete');

//Role
Route::get('/role', 'RoleController@index');
Route::get('/role/{id}', 'RoleController@show');
Route::post('/role/create', 'RoleController@store');
Route::put('role/update/{id}', 'RoleController@update');
Route::get('role/delete/{id}', 'RoleController@delete');

//RolePermission
Route::get('/rolePermission', 'RolePermissionController@index');
Route::get('/rolePermission/{id}', 'RolePermissionController@show');
Route::post('/rolePermission/create', 'RolePermissionController@store');
Route::put('rolePermission/update/{id}', 'RolePermissionController@update');
Route::get('rolePermission/delete/{id}', 'RolePermissionController@delete');

//Stall
Route::get('/stall', 'StallController@index');
Route::get('/stall/{id}', 'StallController@show');
Route::post('/stall/create', 'StallController@store');
Route::put('stall/update/{id}', 'StallController@update');
Route::get('stall/delete/{id}', 'StallController@delete');

//StreetAddress
Route::get('/streetAddress', 'StreetAddressController@index');
Route::get('/streetAddress/{id}', 'StreetAddressController@show');
Route::post('/streetAddress/create', 'StreetAddressController@store');
Route::put('streetAddress/update/{id}', 'StreetAddressController@update');
Route::get('streetAddress/delete/{id}', 'StreetAddressController@delete');

//SubCategory
Route::get('/subCategory', 'SubCategoryController@index');
Route::get('/subCategory/{id}', 'SubCategoryController@show');
Route::post('/subCategory/create', 'SubCategoryController@store');
Route::put('subCategory/update/{id}', 'SubCategoryController@update');
Route::get('subCategory/delete/{id}', 'SubCategoryController@delete');

//UnitOfMeasure
Route::get('/unitOfMeasure', 'UnitOfMeasureController@index');
Route::get('/unitOfMeasure/{id}', 'UnitOfMeasureController@show');
Route::post('/unitOfMeasure/create', 'UnitOfMeasureController@store');
Route::put('unitOfMeasure/update/{id}', 'UnitOfMeasureController@update');
Route::get('unitOfMeasure/delete/{id}', 'UnitOfMeasureController@delete');

//User
Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/create', 'UserController@store');
Route::put('user/update/{id}', 'UserController@update');
Route::get('user/delete/{id}', 'UserController@delete');

//UserStall
Route::get('/userStall', 'UserStallController@index');
Route::get('/userStall/{id}', 'UserStallController@show');
Route::post('/userStall/create', 'UserStallController@store');
Route::put('userStall/update/{id}', 'UserStallController@update');
Route::get('userStall/delete/{id}', 'UserStallController@delete');


