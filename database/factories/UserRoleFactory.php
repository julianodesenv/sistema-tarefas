<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use AgenciaS3\Model;
use Faker\Generator as Faker;

$factory->define(\AgenciaS3\Entities\UserRole::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
