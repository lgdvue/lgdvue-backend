<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Location;
use App\User;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    $initialLat = 40.5;
    $initialLng = -3.7;
    $deltaMin = -4000;
    $deltaMax = 3000;
    $latitude = $initialLat + $faker->numberBetween($deltaMin, $deltaMax) / 1000;
    $longitude = $initialLng + $faker->numberBetween($deltaMin, $deltaMax) / 1000;

    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'type' => 'house',
        'latitude' => $latitude,
        'longitude' => $longitude,
    ];
});
