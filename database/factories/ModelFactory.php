<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|\
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Seller::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'seller_address_id' => 0
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, 1, 9999),
        'description' => $faker->realText,
        'seller_id' => 0
    ];
});

$factory->define(App\SellerAddress::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'postal_code' => $faker->postcode
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {
    return [
        'reviewer_name' => $faker->name,
        'title' => $faker->randomFloat(2, 1, 9999),
        'content' => $faker->realText,
        'review_date' => $faker->date,
        'product_id' => 0
    ];
});
