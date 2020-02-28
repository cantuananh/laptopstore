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

$factory->define(\App\FeedBack::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'product_id' => \App\Product::all()->random()->id,
        'content' => $faker->name,
        'created_at' => $faker->dateTime,
        'updated_at' =>$faker->dateTime
    ];
});
