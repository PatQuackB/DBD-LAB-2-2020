<?php

namespace Database\Seeders;

use \App\Models\Region;
use \App\Models\Category;
use \App\Models\Commune;
use \App\Models\DeliveryOrder;
use \App\Models\Fair;
use \App\Models\NumberAddress;
use \App\Models\PaymentMethod;
use \App\Models\Permission;
use \App\Models\Product;
use \App\Models\Role;
use \App\Models\RolePermission;
use \App\Models\Stall;
use \App\Models\StreetAddress;
use \App\Models\SubCategory;
use \App\Models\ProductStall;
use \App\Models\UserStall;
use \App\Models\PurchaseOrder;
use \App\Models\UnitOfMeasure;
use \App\Models\PurchaseOrderProduct;
use \App\Models\DeliveryOrderPurchaseOrder;
use \App\Models\PaymentMethodUser;
use \App\Models\ProductUnitOfMeasure;
use \App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cantidadSeeders=15;
        
        Fair::factory($cantidadSeeders)->create();
        //Region::factory($cantidadSeeders)->create();
        Region::insert([
            [ 'id' => 1, 'nombreRegion' => 'I Region de Tarapaca', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 2, 'nombreRegion' => 'II Region de Antofagasta', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 3, 'nombreRegion' => 'III Region de Atacama', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 4, 'nombreRegion' => 'IV Region de Coquimbo', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 5, 'nombreRegion' => 'V Region de Valparaiso', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 6, 'nombreRegion' => 'VI Region del Libertador General Bernardo OHiggins', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 7, 'nombreRegion' => 'VII Region del Maule', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 8, 'nombreRegion' => 'VIII Region del Biobio', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 9, 'nombreRegion' => 'IX Region de La Araucania', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 10, 'nombreRegion' => 'X Region de Los Lagos', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 11, 'nombreRegion' => 'XI Region Aysen del General Carlos Ibañez del Campo', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 12, 'nombreRegion' => 'XII Region de Magallanes y Antartica Chilena', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 13, 'nombreRegion' => 'XIII Region Metropolitana de Santiago', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 14, 'nombreRegion' => 'XIV Region de Los Rios', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 15, 'nombreRegion' => 'XV Region de Arica y Parinacota', 'softDelete' => false,'created_at' => now()],
            [ 'id' => 16, 'nombreRegion' => 'XVI Region de Ñuble', 'softDelete' => false,'created_at' => now()]
           ]);
        Role::insert([
            ['id' => 1, 'nombreRol' => "Comprador", 'softDelete' => false,'created_at' => now()],
            ['id' => 2, 'nombreRol' => "Vendedor", 'softDelete' => false,'created_at' => now()]
        ]);

        StreetAddress::factory($cantidadSeeders)->create();
        UnitOfMeasure::factory($cantidadSeeders)->create();
        Category::factory($cantidadSeeders)->create();
        Permission::factory($cantidadSeeders)->create();
        RolePermission::factory($cantidadSeeders)->create();
        Commune::factory($cantidadSeeders)->create();
        NumberAddress::factory($cantidadSeeders)->create();
        SubCategory::factory($cantidadSeeders)->create();
        Product::factory($cantidadSeeders)->create();
        ProductUnitOfMeasure::factory($cantidadSeeders)->create();
        Stall::factory($cantidadSeeders)->create();
        ProductStall::factory($cantidadSeeders)->create();
        DeliveryOrder::factory($cantidadSeeders)->create();
        User::factory($cantidadSeeders)->create();
        PaymentMethod::factory($cantidadSeeders)->create();
        UserStall::factory($cantidadSeeders)->create();
        PurchaseOrder::factory($cantidadSeeders)->create();
        PurchaseOrderProduct::factory($cantidadSeeders)->create();
        DeliveryOrderPurchaseOrder::factory($cantidadSeeders)->create();
        PaymentMethodUser::factory($cantidadSeeders)->create();

    }
}
