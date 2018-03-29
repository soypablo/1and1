<?php

use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function () {
    $faker=Factory::create('zh-CN');
    $time = $faker->dateTimeThisMonth();
    return [
        'content'=>$faker->sentence(),
        'created_at'=>$time,
        'updated_at'=>$time,
    ];
});
