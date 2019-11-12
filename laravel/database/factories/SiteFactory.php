<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'url' => $faker->url,
        'ssl_last_update' => $faker->date(),
        'ssl_expires_at' => $faker->date(),
    ];
});
