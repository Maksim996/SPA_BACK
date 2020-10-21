<?php

namespace Database\Factories;

use App\Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type_passport = $this->faker->numberBetween(0, 1);
        $passport = $type_passport == 1 ? $this->faker->unique()->randomNumber(9, true): 'ВМ' . $this->faker->unique()->randomNumber(6, true);
        $sex = $this->faker->numberBetween(0, 1);
        $imageType = $sex == 0 ? 'women': 'men';

        return [
            'first_name' => $this->faker->firstName($gender = 'male'|'female'),
            'second_name' => $this->faker->lastName,
            'patronymic' => $this->faker->firstName($gender = 'male'|'female'),
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone' => $this->faker->unique()->numerify('38050#######'),// 9 numbers
            'additional_phone' => null,
            'type_passport' => $type_passport,
            'passport' =>  $passport,
            'inn_code' => $this->faker->unique()->numerify('##########'),//10 numbers
            'sex' => $sex,
            'image' => 'https://randomuser.me/api/portraits/'.$imageType.'/'.$this->faker->randomNumber(2) .'.jpg',
            'description' => $this->faker->text(200),
            'background_url' => null,
        ];
    }
}
