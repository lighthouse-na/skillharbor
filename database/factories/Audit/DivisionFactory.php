<?php

namespace Database\Factories\Audit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\Division>
 */
class DivisionFactory extends Factory
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
            'division_name' => $this->faker->unique()->randomElement([
                'Business Division',
                'Technical Operations',
                'CEO\'s Office',
                'Human Resources',
                'Finance Division',
                'Marketing Division',
            ]),
        ];
    }
}
