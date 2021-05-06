<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActivationKey;
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

$factory->define(ActivationKey::class, function (Faker $faker) {

    return [
        'key' => Str::random(5). '-' . Str::random(5),
        'activation_date' => null,
        'user_id' => random_int(0, 10),
    ];
});
