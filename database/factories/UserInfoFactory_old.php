<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Info::class, function (Faker $faker) {

    $type_passport = $faker->numberBetween(0, 1);
    $passport = $type_passport === 1
        ? $faker->unique()->randomNumber(9, true)
        : 'ВМ' . $faker->unique()->randomNumber(6, true);
    $sex = $faker->numberBetween(0, 1);
    $imageType = $sex === 0 ? 'women': 'men';

    return [
        'first_name' => $faker->firstName($gender = 'male'|'female'),
        'second_name' => $faker->lastName,
        'patronymic' => $faker->firstName($gender = 'male'|'female'),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->unique()->numerify('38050#######'),// 9 numbers
        'additional_phone' => null,
        'type_passport' => $type_passport,
        'passport' =>  $passport,
        'inn_code' => $faker->unique()->numerify('##########'),//10 numbers
        'sex' => $sex,
        'image' => 'https://randomuser.me/api/portraits/'.$imageType.'/'.$faker->randomNumber(2) .'.jpg',
        'description' => $faker->text(200),
        'background_url' => null,
    ];
});
