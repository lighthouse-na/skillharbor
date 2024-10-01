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
        $skills = [
            'Programming Languages',
            'Web Development',
            'Mobile App Development',
            'Database Management',
            'Data Analysis',
            'Machine Learning',
            'Artificial Intelligence',
            'Cybersecurity',
            'Cloud Computing',
            'Network Administration',
            'UI/UX Design',
            'Graphic Design',
            'Project Management',
            'Agile Methodologies',
            'DevOps',
            'Quality Assurance',
            'Technical Writing',
            'Content Writing',
            'Digital Marketing',
            'Search Engine Optimization (SEO)',
            'Social Media Management',
            'Video Editing',
            'Photography',
            'Content Management Systems (CMS)',
            'E-commerce Platforms',
            'Customer Relationship Management (CRM)',
            'Salesforce',
            'Business Intelligence',
            'Blockchain Development',
            'Virtual Reality (VR) Development',
            'Augmented Reality (AR) Development',
        ];

        return [
            //
            'skill_category_id' => $this->faker->randomElement($category_ids),
            'skill_title' => $this->faker->unique()->randomElement($skills),
            'skill_description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
