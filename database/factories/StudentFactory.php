<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {
    return [
        'teacher_id' =>$faker->numberBetween($min = 1, $max = 25),
        'name' => $faker->name,
        'email' =>$faker->email,
        'class' =>$faker->numberBetween($min = 1, $max = 12)
    ];
});
