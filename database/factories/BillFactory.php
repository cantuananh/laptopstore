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

$factory->define(\App\Bill::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'supplier_id' => \App\Supplier::all()->random()->id,
        'payment' => $faker->numberBetween(1,2),
        'created_at' => $faker->dateTime,
        'updated_at' =>$faker->dateTime
    ];
});
