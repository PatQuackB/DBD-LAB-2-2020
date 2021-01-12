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
        Fair::factory(5)->create();
        Region::factory(5)->create();
        StreetAddress::factory(5)->create();
        Role::factory(5)->create();
        UnitOfMeasure::factory(5)->create();
        Category::factory(5)->create();
        Permission::factory(5)->create();
        RolePermission::factory(5)->create();
        Commune::factory(5)->create();
        NumberAddress::factory(5)->create();
        SubCategory::factory(5)->create();
        Product::factory(5)->create();
        ProductUnitOfMeasure::factory(5)->create();
        Stall::factory(5)->create();
        ProductStall::factory(5)->create();
        DeliveryOrder::factory(5)->create();
        User::factory(5)->create();
        PaymentMethod::factory(5)->create();
        UserStall::factory(5)->create();
        PurchaseOrder::factory(5)->create();
        PurchaseOrderProduct::factory(5)->create();
        DeliveryOrderPurchaseOrder::factory(5)->create();
        PaymentMethodUser::factory(5)->create();

    }
}
