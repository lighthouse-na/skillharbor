<?php

namespace Database\Factories\Audit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\prerequisite>
 */
class prerequisiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Code B: Drivers License',
            'Code C1: Drivers License',
            'Code C: Drivers License',
            'Forklift License',
            'First Aid Certificate',
            'Fire Fighting Certificate',
            'Cisco Certified Network Associate',
            'Cisco Certified Network Professional',
            'Cisco Certified Internetwork Expert',
            'SAP Certified Application Associate',
            'SAP Certified Application Professional',
            'SAP Certified Technology Associate',
            'Comptia A+',
            'Comptia Network+',
            'Comptia Security+',
            'Comptia Linux+',
            'Comptia Server+',
            'Comptia Cloud+',
            'Comptia Project+',
            'Comptia CySA+',
        ];

        return [
            //
            'prerequisite_title' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
