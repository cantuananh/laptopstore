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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'gender' => $faker->numberBetween(0,1),
        'phone' =>$faker->phoneNumber,
        'birthday' => $faker->dateTime,
        'address' => $faker->address,
        'status' => $faker->numberBetween(0,1),
        'remember_token' => Str::random(10),
        'created_at' => $faker->dateTime,
        'updated_at' =>$faker->dateTime
    ];
});
