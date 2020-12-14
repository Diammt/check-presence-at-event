<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'phone' => "6222222".$faker->unique()->randomDigit,
        'active' => $faker->boolean(50),
        //'email' => $faker->unique()->safeEmail,
        //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => Hash::make("secret"),
        'verification_code' => $faker->numberBetween(100, 999),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
