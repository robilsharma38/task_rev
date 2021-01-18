<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Teacher::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'email'=>$faker->email,
    ];
});
