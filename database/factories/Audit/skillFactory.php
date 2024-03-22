<?php

namespace Database\Factories\Audit;

use App\Models\Audit\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit\skill>
 */
class skillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_ids = category::select('id')->get();

        return [
            //
            'skill_category_id' => $this->faker->randomElement($category_ids),
            'skill_title' => $this->faker->name(),
        ];
    }
}
