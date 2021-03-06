<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Region;
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

Route::get('/welcome', function(){
    return view('welcome');
});
Route::get('/iniciarSesion', function(){
    return view('iniciarSesion');
});

/*
Route::resource('categories', 'CategoryController');
Route::resource('communes', 'CommuneController');
Route::resource('deliveryOrders', 'DeliveryOrderController');
Route::resource('deliveryOrdersPurchaseOrder', 'DeliveryOrderPurchaseOrderController');
Route::resource('fairs', 'FairController');
Route::resource('numberAddresses', 'NumberAddressController');
Route::resource('paymentMethods', 'PaymentMethodController');
Route::resource('paymentMethodUsers', 'PaymentMethodUserController');
Route::resource('permissions', 'PermissionController');
Route::resource('products', 'ProductController');
Route::resource('productStalls', 'ProductStallController');
Route::resource('productUnitOfMeasures', 'ProductUnitOfMeasureController');
Route::resource('purchaseOrders', 'PurchaseOrderController');
Route::resource('purchaseOrderProducts', 'PurchaseOrderProductController');
Route::resource('regions', 'RegionController');
Route::resource('roles', 'RoleController');
Route::resource('rolePermissions', 'RolePermissionController');
Route::resource('stalls', 'StallController');
Route::resource('streetAddresses', 'StreetAddressController');
Route::resource('subCategories', 'SubCategoryController');
Route::resource('unitOfMeasures', 'UnitOfMeasureController');
Route::resource('users', 'UserController');
Route::resource('userStalls', 'UserStallController');
*/

//Category
Route::get('/category', 'CategoryController@index');
Route::get('/category/{id}', 'CategoryController@show');
Route::post('/category/create', 'CategoryController@store');
Route::put('/category/update/{id}', 'CategoryController@update');
Route::get('/category/destroy/{id}', 'CategoryController@destroy');
Route::get('/category/restore/{id}', 'CategoryController@restore');

//Commune
Route::get('/commune', 'CommuneController@index');
Route::get('/homeBackFiltrado/{id}', 'CommuneController@filtrarPorComuna')->name('filtrarComuna');
Route::get('/commune/{id}', 'CommuneController@show');
Route::post('/commune/create', 'CommuneController@store');
Route::put('/commune/update/{id}', 'CommuneController@update');
Route::get('/commune/destroy/{id}', 'CommuneController@destroy');
Route::get('/commune/restore/{id}', 'CommuneController@restore');

//DeliveryOrder
Route::get('/deliveryOrder', 'DeliveryOrderController@index');
Route::get('/deliveryOrder/{id}', 'DeliveryOrderController@show');
Route::post('/deliveryOrder/create', 'DeliveryOrderController@store');
Route::put('/deliveryOrder/update/{id}', 'DeliveryOrderController@update');
Route::get('/deliveryOrder/destroy/{id}', 'DeliveryOrderController@destroy');
Route::get('/deliveryOrder/restore/{id}', 'DeliveryOrderController@restore');

//DeliveryOrderPurchaseOrder
Route::get('/deliveryOrderPurchaseOrder', 'DeliveryOrderPurchaseOrderController@index');
Route::get('/deliveryOrderPurchaseOrder/{id}', 'DeliveryOrderPurchaseOrderController@show');
Route::post('/deliveryOrderPurchaseOrder/create', 'DeliveryOrderPurchaseOrderController@store');
Route::put('/deliveryOrderPurchaseOrder/update/{id}', 'DeliveryOrderPurchaseOrderController@update');
Route::get('/deliveryOrderPurchaseOrder/destroy/{id}', 'DeliveryOrderPurchaseOrderController@destroy');
Route::get('/deliveryOrderPurchaseOrder/restore/{id}', 'DeliveryOrderPurchaseOrderController@restore');

//Fair
Route::get('/fair', 'FairController@index');
Route::get('/fair/{id}', 'FairController@show');
Route::post('/fair/create', 'FairController@store');
Route::put('/fair/update/{id}', 'FairController@update');
Route::get('/fair/destroy/{id}', 'FairController@destroy');
Route::get('/fair/restore/{id}', 'FairController@restore');

//NumberAddress
Route::get('/numberAddress', 'NumberAddressController@index');
Route::get('/numberAddress/{id}', 'NumberAddressController@show');
Route::post('/numberAddress/create', 'NumberAddressController@store');
Route::put('/numberAddress/update/{id}', 'NumberAddressController@update');
Route::get('/numberAddress/destroy/{id}', 'NumberAddressController@destroy');
Route::get('/numberAddress/restore/{id}', 'NumberAddressController@restore');

//PaymentMethod
Route::get('/paymentMethod', 'PaymentMethodController@index');
Route::get('/paymentMethod/{id}', 'PaymentMethodController@show');
Route::post('/paymentMethod/create', 'PaymentMethodController@store');
Route::put('/paymentMethod/update/{id}', 'PaymentMethodController@update');
Route::get('/paymentMethod/destroy/{id}', 'PaymentMethodController@destroy');
Route::get('/paymentMethod/restore/{id}', 'PaymentMethodController@restore');

//PaymentMethodUser
Route::get('/paymentMethodUser', 'PaymentMethodUserController@index');
Route::get('/paymentMethodUser/{id}', 'PaymentMethodUserController@show');
Route::post('/paymentMethodUser/create', 'PaymentMethodUserController@store');
Route::put('/paymentMethodUser/update/{id}', 'PaymentMethodUserController@update');
Route::get('/paymentMethodUser/destroy/{id}', 'PaymentMethodUserController@destroy');
Route::get('/paymentMethodUser/restore/{id}', 'PaymentMethodUserController@restore');

//Permission
Route::get('/permission', 'PermissionController@index');
Route::get('/permission/{id}', 'PermissionController@show');
Route::post('/permission/create', 'PermissionController@store');
Route::put('/permission/update/{id}', 'PermissionController@update');
Route::get('/permission/destroy/{id}', 'PermissionController@destroy');
Route::get('/permission/restore/{id}', 'PermissionController@restore');

//Product
Route::get('/crearProducto/{id}', 'ProductController@irCrearProducto')->name('crearProducto');
Route::post('/crearProducto/{id}', 'ProductController@store2')->name('crearNuevoProducto');

Route::get('/product', 'ProductController@index');
Route::get('/eliminarSession', 'ProductController@eliminarSession');
Route::get('/producto/{id}', 'ProductController@show2')->name('producto');
Route::get('/agregarAlCarrito/{id}/{id}', 'ProductController@agregarAlCarrito')->name('agregarAlCarrito');
Route::get('/carrito/{id}', 'ProductController@carrito')->name('carrito');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product/create', 'ProductController@store');
Route::put('/product/update/{id}', 'ProductController@update');
Route::get('/product/destroy/{id}', 'ProductController@destroy');
Route::get('/product/restore/{id}', 'ProductController@restore');

//ProductStall
Route::get('/productStall', 'ProductStallController@index');
Route::get('/productStall/{id}', 'ProductStallController@show');
Route::post('/productStall/create', 'ProductStallController@store');
Route::put('/productStall/update/{id}', 'ProductStallController@update');
Route::get('/productStall/destroy/{id}', 'ProductStallController@destroy');
Route::get('/productStall/restore/{id}', 'ProductStallController@restore');

//ProductUnitOfMeasure
Route::get('/productUnitOfMeasure', 'ProductUnitOfMeasureController@index');
Route::get('/productUnitOfMeasure/{id}', 'ProductUnitOfMeasureController@show');
Route::post('/productUnitOfMeasure/create', 'ProductUnitOfMeasureController@store');
Route::put('/productUnitOfMeasure/update/{id}', 'ProductUnitOfMeasureController@update');
Route::get('/productUnitOfMeasure/destroy/{id}', 'ProductUnitOfMeasureController@destroy');
Route::get('/productUnitOfMeasure/restore/{id}', 'ProductUnitOfMeasureController@restore');

//PurchaseOrder
Route::get('/purchaseOrder', 'PurchaseOrderController@index');
Route::get('/purchaseOrder/{id}', 'PurchaseOrderController@show');
Route::post('/purchaseOrder/create', 'PurchaseOrderController@store');
Route::put('/purchaseOrder/update/{id}', 'PurchaseOrderController@update');
Route::get('/purchaseOrder/destroy/{id}', 'PurchaseOrderController@destroy');
Route::get('/purchaseOrder/restore/{id}', 'PurchaseOrderController@restore');

//PurchaseOrderProduct
Route::get('/purchaseOrderProduct', 'PurchaseOrderProductController@index');
Route::get('/purchaseOrderProduct/{id}', 'PurchaseOrderProductController@show');
Route::post('/purchaseOrderProduct/create', 'PurchaseOrderProductController@store');
Route::put('/purchaseOrderProduct/update/{id}', 'PurchaseOrderProductController@update');
Route::get('/purchaseOrderProduct/destroy/{id}', 'PurchaseOrderProductController@destroy');
Route::get('/purchaseOrderProduct/restore/{id}', 'PurchaseOrderProductController@restore');

//Region
Route::get('/registro', 'RegionController@index')->name('regionIndex'); //ESTE NOMBRE SE USA PARA LLAMAR A LA RUTA; DESDE HREF O DESDE ACTION
Route::get('/region/{id}', 'RegionController@show');
Route::post('/region/create', 'RegionController@store');
Route::put('/region/update/{id}', 'RegionController@update');
Route::get('/region/destroy/{id}', 'RegionController@destroy');
Route::get('/region/restore/{id}', 'RegionController@restore');

//Role
Route::get('/role', 'RoleController@index');
Route::get('/role/{id}', 'RoleController@show');
Route::post('/role/create', 'RoleController@store');
Route::put('/role/update/{id}', 'RoleController@update');
Route::get('/role/destroy/{id}', 'RoleController@destroy');
Route::get('/role/restore/{id}', 'RoleController@restore');

//RolePermission
Route::get('/rolePermission', 'RolePermissionController@index');
Route::get('/rolePermission/{id}', 'RolePermissionController@show');
Route::post('/rolePermission/create', 'RolePermissionController@store');
Route::put('/rolePermission/update/{id}', 'RolePermissionController@update');
Route::get('/rolePermission/destroy/{id}', 'RolePermissionController@destroy');
Route::get('/rolePermission/restore/{id}', 'RolePermissionController@restore');

//Stall
Route::get('/stall', 'StallController@index');
Route::get('/stall/{id}', 'StallController@irPuesto')->name('irPuesto');
Route::post('/stall/{id}', 'StallController@crearPuesto')->name('crearNuevoPuesto');
Route::put('/stall/update/{id}', 'StallController@update');
Route::get('/stall/destroy/{id}', 'StallController@destroy');
Route::get('/stall/restore/{id}', 'StallController@restore');

//StreetAddress
Route::get('/streetAddress', 'StreetAddressController@index');
Route::get('/streetAddress/{id}', 'StreetAddressController@show');
Route::post('/streetAddress/create', 'StreetAddressController@store');
Route::put('/streetAddress/update/{id}', 'StreetAddressController@update');
Route::get('/streetAddress/destroy/{id}', 'StreetAddressController@destroy');
Route::get('/streetAddress/restore/{id}', 'StreetAddressController@restore');

//SubCategory
Route::get('/subCategory', 'SubCategoryController@index');
Route::get('/subCategory/{id}', 'SubCategoryController@show');
Route::post('/subCategory/create', 'SubCategoryController@store');
Route::put('/subCategory/update/{id}', 'SubCategoryController@update');
Route::get('/subCategory/destroy/{id}', 'SubCategoryController@destroy');
Route::get('/subCategory/restore/{id}', 'SubCategoryController@restore');

//UnitOfMeasure
Route::get('/unitOfMeasure', 'UnitOfMeasureController@index');
Route::get('/unitOfMeasure/{id}', 'UnitOfMeasureController@show');
Route::post('/unitOfMeasure/create', 'UnitOfMeasureController@store');
Route::put('/unitOfMeasure/update/{id}', 'UnitOfMeasureController@update');
Route::get('/unitOfMeasure/destroy/{id}', 'UnitOfMeasureController@destroy');
Route::get('/unitOfMeasure/restore/{id}', 'UnitOfMeasureController@restore');

//User
Route::get('/perfilShow/{id}', 'UserController@irPerfil')->name('userPerfil');
Route::get('/homeBack/{id}', 'UserController@homeBack')->name('userHome');
Route::get('/home', 'UserController@nuevoShow')->name('userInicioSesion');
Route::get('/perfil/{id}', 'UserController@show');
Route::get('/perfilModificar/{id}', 'UserController@showEditarPerfil');
Route::post('/iniciarSesion', 'UserController@store')->name('userStore');
Route::put('/perfilEditado/{id}', 'UserController@update')->name('userUpdate');
Route::get('/user/destroy/{id}', 'UserController@destroy');
Route::get('/user/restore/{id}', 'UserController@restore');

//UserStall
Route::get('/userStall', 'UserStallController@index');
Route::get('/userStall/{id}', 'UserStallController@show');
Route::post('/userStall/create', 'UserStallController@store');
Route::put('/userStall/update/{id}', 'UserStallController@update');
Route::get('/userStall/destroy/{id}', 'UserStallController@destroy');
Route::get('/userStall/restore/{id}', 'UserStallController@restore');


