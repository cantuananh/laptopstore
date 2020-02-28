<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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

$factory->define(\App\DetailProduct::class, function (Faker $faker) {
    return [
        'product_id' => \App\Product::all()->random()->id,
        'seri' => $faker->name,
        'status' => $faker->numberBetween(1,2),
        'created_at' => $faker->dateTime,
        'updated_at' =>$faker->dateTime
    ];
});
