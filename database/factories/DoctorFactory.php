<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Dr. ' . $this->faker->name,
            'speciality' => $this->faker->randomElement(['Cardiologist', 'Dermatologist', 'Endocrinologist', 'Gastroenterologist', 'Hematologist', 'Neurologist', 'Oncologist', 'Pediatrician', 'Psychiatrist', 'Urologist']),
            'image' => $this->faker->imageUrl(60, 60),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
