<?php

use App\Models\Category;
use App\Models\User;
use Faker\Factory;



$factory->define(App\Models\Topic::class, function () {
    $faker =Factory::create('zh_CN');
    $users_id=User::all()->pluck('id')->toArray();
    $category_id=Category::all()->pluck('id')->toArray();
    $created_at=$faker->dateTimeThisYear();
    $updated_at=$faker->dateTimeThisYear($created_at);
    return [
        'title'=>$faker->sentence(),
        'body'=>$faker->text(),
        'excerpt'=>$faker->sentence(),
        'user_id'=>array_random($users_id),
        'category_id'=>array_random($category_id),
        'created_at'=>$created_at,
        'updated_at'=>$updated_at,
    ];
});
