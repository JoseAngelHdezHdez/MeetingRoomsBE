<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MeetingRoom;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(MeetingRoom::class, function (Faker $faker) {
    return [
        'code_room' => $faker->word(),
        'size' => $faker->randomElement(['Grande', 'Mediano', 'Chico'])
    ];
});

