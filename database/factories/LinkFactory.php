<?php

use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(App\Models\Link::class, function () {
   $faker = Factory::create('zh-CN');
    return [
        'title'=>$faker->title,
        'link' =>$faker->url,
    ];
});
