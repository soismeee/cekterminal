<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TerminalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_terminal' => $this->faker->sentence(mt_rand(6, 10))
        ];
    }
}
