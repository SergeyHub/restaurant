<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
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
            'guest_number' => $this->faker->numberBetween($min = 2, $max = 9),
            'status' => 'avaliable',
            'location' => $this->faker->text(15)
        ];
    }
}
