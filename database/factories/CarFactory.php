<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentences(10, true),
            'price' => 30000,
            'numberOfStocks'  => 10,
            'address' => $this->faker->sentences(4, true),
            'available' =>  $this->faker->boolean()
        ];
    }
}
