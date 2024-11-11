<?php

namespace Database\Factories\Audit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\assessment>
 */
class assessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $assessmentName = 'Skills Audit - '.date('Y');

        return [
            //
            'assessment_title' => $assessmentName,
            'closing_date' => $this->faker->dateTimeBetween('-1 day', '+3 months'),
        ];
    }
}
