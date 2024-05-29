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
            "name" => $this->faker->word(mt_rand(3,8), true),
            "price" => $this->faker->randomNumber(5,true),
            "stock" => $this->faker->randomNumber(3,true),
            "description" => collect($this->faker->paragraphs(mt_rand(1,3)))
        ];
    }
}
