<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
            'description' => $this->faker->text(25),
            'image' => $this->faker->text(25),
            'price' => $this->faker->numberBetween($min = 5, $max = 150)
        ];
    }
}
