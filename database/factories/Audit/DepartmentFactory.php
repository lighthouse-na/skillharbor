<?php

namespace Database\Factories\Audit;

use App\Models\Audit\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\Department>
 */
class DepartmentFactory extends Factory
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
            'department_name' => $this->faker->unique(true)->randomElement([
                'Commercial General',
                'Wholesales',
                'Government',
                'Sales Support',
                'Customer Care Centre',
                'Retail & Corporate',
                'Tops General',
                'DEPI',
                'PMO',
                'BIT',
                'Network Operations',
                'Field Services General',
                'Field Services',
                'CEO\'s Office General',
                'Legal',
                'Public Relations',
                'Internal Audit & Risk',
                'Company Secretary',
            ]),
            'division_id' => $this->faker->randomELement(Division::all()),
        ];
    }
}
