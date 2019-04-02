<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Todo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name('male'),
    ];
});


$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'post_title' => $faker->text($maxNbChars = 20) ,
        'content' => $faker->text($maxNbChars = 300),
        'image' => $faker->imageUrl($width = 640, $height = 480) 
    ];
});
