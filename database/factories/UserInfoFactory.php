<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = rand(0,1);
        $gender == 0 ? $gender = "Male" : $gender = "Female";

        $age = rand(18,80);

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->firstName(),
            'surname'=>$this->faker->lastName(),
            'gender'=> $gender,
            'location'=> "San Francisco",
            'age'=>$age,
        ];
    }
}
