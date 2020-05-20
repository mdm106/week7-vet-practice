<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Animal;
use Faker\Generator as Faker;

$factory->define(Animal::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName,
        'type'=>$faker->word,
        'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'weight_kg'=>$faker->randomFloat($nbMaxDecimals = 2, $max=500.0),
        'height_cm'=>$faker->randomFloat($nbMaxDecimals = 2, $max=500.0),
        'biteyness'=>$faker->numberBetween($min = 1, $max = 5),
        'owner_id'=>$faker->numberBetween($min = 1, $max = 1000),
    ];
});

