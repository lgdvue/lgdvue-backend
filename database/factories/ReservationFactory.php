<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Location;
use App\Reservation;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'location_id' => function () {
            return factory(Location::class)->create()->id;
        },
        'name' => $faker->name,
        'surname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'duration' => '1 hour',
        'adult' => 0,
        'more' => 'I need this location for make a movie',
    ];
});
