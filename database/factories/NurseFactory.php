<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NurseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Nurse ' . $this->faker->name,
            'speciality' => $this->faker->randomElement(['Specialist', 'General', 'Intensive Care', 'Pediatric', 'Maternity', 'Emergency', 'Surgical', 'Neonatal', 'Oncology', 'Rheumatology']),
            'image' => $this->faker->imageUrl(60, 60),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
