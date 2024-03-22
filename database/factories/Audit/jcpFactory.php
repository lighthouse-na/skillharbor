<?php

namespace Database\Factories\Audit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\jcp>
 */
class jcpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $assessment_ids = \App\Models\Audit\assessments::select('id')->get();
        $user_ids = \App\Models\User::select('id')->get();


        return [
            //This populates the jcp model fields
            'assessment_id' => $this->faker->randomElement($assessment_ids),
            'user_id' => $this->faker->randomElement($user_ids),
            'position_title' => $this->faker->jobTitle(),
            'job_grade' => $this->faker->numerify('B-#'),
            'duty_station' => $this->faker->city(),
            'job_purpose' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
