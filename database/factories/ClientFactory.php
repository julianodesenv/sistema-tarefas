<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use AgenciaS3\Entities\Client;
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

$factory->define(Client::class, function (Faker $faker) {
    $type = ['pf', 'pj'];
    $typeRand = rand(0, 1);

    return [
        'user_id' => rand(1,3),
        'type' => $type[$typeRand],
        'type_client_id' => rand(1, 4),
        'segment_client_id' => rand(1, 4),
        'entry_date' => date('Y-m-d'),
        'name' => $faker->name,
        'email' => $faker->email,
        'active' => 'y'
    ];
});
