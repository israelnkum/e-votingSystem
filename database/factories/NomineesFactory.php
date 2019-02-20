<?php

use Faker\Generator as Faker;

$factory->define(App\Nominee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'other_name' =>$faker-> lastName,
        'date_of_birth' => $faker->date('Y-m-d'),
        'home_town' => $faker->city,
        'region' => $faker->country,
        'home_address' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->email,
        'level_id' => $faker->numberBetween(1,3),
        'department_id' => $faker->numberBetween(1,2),
        'index_number'=>$faker->text(10),
        'cgpa' => $faker->numberBetween(1.10,4.99),
        'voting_id' => $faker->numberBetween(1,2),
        'position_id' => $faker->numberBetween(1,7),
        'position_number' => $faker->numberBetween(1,7),
        'added_by' => 'israelnkum',


        ];
});
