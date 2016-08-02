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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $faker=Faker\Factory::create('fr_FR');
    return [
        'nom' => $faker->firstName,
        'prenom'=>$faker->lastName,
        'email' => $faker->email,
        'ville'=>$faker->country,
        'post'=>$faker->postcode,
        'societe'=>$faker->company,
        'type'=>$faker->randomElement(array('1','2')),
        'address'=>$faker->address,
        'tel'=>$faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
