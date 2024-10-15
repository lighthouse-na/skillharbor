<?php

namespace Database\Factories\Audit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\category>
 */
class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Behavioral',
            'Knowledge',
            'Basic Digital',
            'Advanced Digital',
            'Soft Skills',
        ];

        return [
            //
            'category_title' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
