<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ProductSite;
use Faker\Generator as Faker;

$factory->define(ProductSite::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'url' => $faker->url,
    ];
});
