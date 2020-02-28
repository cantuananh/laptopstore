<?php

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
        factory(\App\Supplier::class, 15)->create();
        factory(\App\Brand::class, 5)->create();
        factory(\App\Product::class, 15)->create();
        factory(\App\DetailProduct::class, 15)->create();
        factory(\App\User::class, 10)->create();
        factory(\App\Role::class, 5)->create();
        factory(\App\FeedBack::class, 5)->create();
        factory(\App\Order::class, 10)->create();
        factory(\App\Bill::class, 5)->create();

    }
}
