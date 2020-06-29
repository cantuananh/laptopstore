<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'brand_id' => \App\Brand::all()->random()->id,
        'description' => $faker->name,
        'cost' => $faker->numberBetween(70000,80000),
        'price' => $faker->numberBetween(60000,70000),
        'ram' => $faker->numberBetween(60000,70000),
        'microprocessors' => $faker->numberBetween(60000,70000),
        'screen' => $faker->numberBetween(60000,70000),
        'quantity' => $faker->numberBetween(10,30),
        'guarantee_time' => $faker->numberBetween(0,24),
        'created_at' => $faker->dateTime,
        'updated_at' =>$faker->dateTime
    ];
});
