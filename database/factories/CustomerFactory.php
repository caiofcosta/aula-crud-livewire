<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'cpf' =>fake()->cpf(),
            'rg' => fake()->rg(),
            'email' => fake()->unique()->safeEmail(),
            'sexo' => fake()->randomElement(['F','M'])
        ];
    }
}
