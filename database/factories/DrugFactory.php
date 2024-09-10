<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Aspirin', 'Ibuprofen', 'Paracetamol', 'Amoxicillin', 'Cephalexin', 'Penicillin','Ciprofloxacin','Metformin','Insulin','Levothyroxine']),
            'dosage' => $this->faker->randomElement(['10mg', '20mg', '30mg', '40mg', '50mg','500mg','1000mg']),
            'quantity' => $this->faker->randomNumber(3, true),
            'price' => $this->faker->randomNumber(5, true),
        ];
    }
}
