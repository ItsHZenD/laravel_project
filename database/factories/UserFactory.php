<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'avatar'=>$this->faker->imageUrl ,
            'email'=>$this->faker->email,
            'password'=>$this->faker->password,
            'phone'=>$this->faker->phoneNumber,
            'link'=>null,
            'role'=>$this->faker->name,
            'bio'=>$this->faker->name,
            'position'=>$this->faker->name,
            'gender'=>$this->faker->name,
            'city'=>$this->faker->name,
            'company_id'=>$this->faker->name,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
