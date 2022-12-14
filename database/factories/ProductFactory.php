<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->word(),
            'description'   => $this->faker->sentence(),
            'status'        => $this->faker->randomElement([true, false]),
            'quantity'      => $this->faker->randomNumber(2, false)
        ];
    }
}
