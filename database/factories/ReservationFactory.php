<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->text(15),
            'last_name' => $this->faker->text(15),
            'phone' => $this->faker->numerify('###-###-####'),
            'res_date' => $this->faker->dateTime(),
            'table_id' => $this->faker->numberBetween($min = 1, $max = 25),
            'guest_number' => $this->faker->numberBetween($min = 2, $max = 9),
        ];
    }
}
