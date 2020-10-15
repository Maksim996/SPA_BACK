<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Info::class, function (Faker $faker) {

    $type_passport = $faker->numberBetween(0, 1);
    $passport = $type_passport === 1
        ? $faker->unique()->randomNumber(9, true)
        : 'ВМ' . $faker->unique()->randomNumber(6, true);

    return [
        'first_name' => $faker->firstName($gender = 'male'|'female'),
        'second_name' => $faker->lastName,
        'patronymic' => $faker->firstName($gender = 'male'|'female'),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->unique()->numerify('380#########'),
        'additional_phone' => null,
        'type_passport' => $type_passport,
        'passport' =>  $passport,
        'inn_code' => $faker->unique()->numerify('#########'),
        'sex' => $faker->numberBetween(0, 1),
        'image' => $faker->imageUrl(),
        'description' => $faker->text(200),
        'background_url' => null,
    ];
});
