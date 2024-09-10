<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_no' => 'Room ' . $this->faker->unique()->numberBetween(100, 999),
            'status' => $this->faker->randomElement(['available', 'active', 'locked']),
            'quantity' => $this->faker->numberBetween(0, 10),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
