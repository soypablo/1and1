<?php

use Carbon\Carbon;
use Faker\Factory;
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

$factory->define(App\Models\User::class, function () {
    $avatar=[
        'img/1.png',
        'img/2.png',
        'img/3.png',
        'img/4.png',
        'img/5.png',

    ];
    $faker =Factory::create('zh_CN');
    $now = Carbon::now()->toDateTimeString();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'avatar'=>array_random($avatar),
        'remember_token' => str_random(10),
        'introduction'=>$faker->sentence(),
        'created_at'=>$now,
        'updated_at'=>$now,
    ];
});
