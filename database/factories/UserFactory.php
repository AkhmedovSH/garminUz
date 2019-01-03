<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'user_id' => 2,
        'points' => 10, // secret
        'tcategory_id' => 1,
        'image' => $faker->name,
    ];
});

$autoIncrement = autoIncrement();

$factory->define(App\Exercise::class, function (Faker $faker) use ($autoIncrement) {
    $autoIncrement->next();
    return [
        'subject_id' => 901,
        'ex_number' => $autoIncrement->current()
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 37; $i++) {
        yield $i;
    }
}
