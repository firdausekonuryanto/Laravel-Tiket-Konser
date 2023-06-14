<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PenontonFactory extends Factory
{
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        static $id_user_random = 1;
        return [
            'id_user' => $id_user_random++,
            'name' => $this->faker->name(),
            'gender' => $gender,
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email()
        ];
    }
}
