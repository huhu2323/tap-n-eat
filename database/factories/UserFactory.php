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
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'username' => $faker->username,
        'contact' => 0000,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->sentence(6, true),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name' => $faker->foodName(),
        'price' => 20,
        'description' => $faker->sentence(6, true),
        'available' => 1,
        'category_id' => 1,
    ];
});

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'rfid' => '0000',
        'first_name' => $faker->firstName(),
        'middle_name' => $faker->lastName(),
        'last_name' => $faker->lastName(),
        'address' => $faker->sentence(6, true),
        'contact' => '090909',
        'credit' => 55,
    ];
});

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'member_id' => $faker->numberBetween($min = 1, $max = 101),
        'name' => $faker->firstName(),
        'product_id' => $faker->numberBetween($min = 1, $max = 3),
        'total_price' => 1000,
        'status' => 0,
        'paid' => true,
    ];
});

