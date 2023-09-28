<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->text(),
            'address' => fake()->address(),
            'min_salary' => fake()->numberBetween(20000, 40000),
            'max_salary' => fake()->numberBetween(40000, 50000),
            'salary_rate' => array_rand(Position::$salaryRateValues),
            'hire_count' => fake()->numberBetween(1, 5),
            'employment_type' => array_rand(Position::$employmentTypeValues),
        ];
    }
}
