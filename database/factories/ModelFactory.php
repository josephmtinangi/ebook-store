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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    $name = ucfirst($faker->unique()->word);

    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    $title = ucfirst($faker->unique()->sentence);

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'category_id' => function () {
            return factory('App\Models\Category')->create()->id;
        },
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
    ];
});
