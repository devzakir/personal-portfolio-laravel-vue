<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(App\Portfolio::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'slug' => str_slug($faker->sentence()),
        'link' => $faker->url,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'category_name' => 'Laravel', 
        'category_id' => 1,
    ];
});


$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'slug' => str_slug($faker->sentence()),
        'link' => $faker->url,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'category_name' => 'HTML', 
        'category_id' => 1,
    ];
});

