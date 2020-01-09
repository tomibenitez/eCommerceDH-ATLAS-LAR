<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {

    $pics = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5'];
    return [
        'name' => $faker->sentence,
        'category_id' => $faker->numberBetween(1, 5),
        'description' => $faker->paragraph(8),
        'price' => $faker->randomFloat(2, 0 , 999999.99),
        'picture' => $faker->randomElement($pics) . '.jpg',
        'admin_id' => '1',
        'created_at' => Carbon\Carbon::now()->toDateTimeString()
    ];
});
