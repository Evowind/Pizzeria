<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class PizzaFactory extends Factory
{

public function definition()
    {
        return [
        'nom' => $this->faker->unique()->word(),
        'description' => $this->faker->text(100),
        'prix' => $this->faker->randomFloat(),
        'created_at' => $this->faker->dateTime(),
        'updated_at' => now(),
        'deleted_at' => $this->faker->boolean(90) ? null: now(),
        ];
    }
}
