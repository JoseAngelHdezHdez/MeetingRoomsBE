<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meeting;
use App\MeetingRoom;
use Faker\Generator as Faker;

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

$factory->define(Meeting::class, function (Faker $faker) {
    $fechaAleatoria = $faker->dateTimeThisMonth;
    $fechaDosHorasDespues = $fechaAleatoria->add(new DateInterval('PT2H'));
    return [
        'meeting_room_id' => MeetingRoom::factory()->create()->id,
        'start_meeting' => $fechaAleatoria,
        'finish_meeting' => $fechaDosHorasDespues,
        'status_meeting' => $faker->randomElement(['Finalizado', 'En proceso', 'Programado'])
    ];
});
