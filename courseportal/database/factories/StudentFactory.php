<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
		'email' => $faker->unique()->email,
		'birthdate' => $faker->date,
		'short_description'=> '-',
		'password'=>bcrypt('12345'),
    ];
});
