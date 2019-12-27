<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'avata' => $faker->image('public/images/users',400,300, null, false) ,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => '1@gmail.com',
        'password' => Hash::make('123123'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'avata' => $faker->image('public/images/users',400,300, null, false) ,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => '123@gmail.com',
        'password' => Hash::make('123123'),
        'remember_token' => str_random(10),
    ];
});
