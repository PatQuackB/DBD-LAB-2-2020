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
        $cantidadSeeders=5;

        Fair::factory($cantidadSeeders)->create();
        Region::factory($cantidadSeeders)->create();
        StreetAddress::factory($cantidadSeeders)->create();
        Role::factory($cantidadSeeders)->create();
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
