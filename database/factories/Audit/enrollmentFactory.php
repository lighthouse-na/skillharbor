<?php

namespace Database\Factories\Audit;

use App\Models\Audit\assessments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\enrollment>
 */
class enrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::all()->random()->id,
            'assessment_id' => assessments::all()->random()->id,
        ];
    }
}
