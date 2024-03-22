<?php

namespace Database\Seeders;

use App\Models\Audit\assessments;
use App\Models\Audit\category;
use App\Models\Audit\enrollment;
use App\Models\Audit\jcp;
use App\Models\Audit\qualification;
use App\Models\Audit\skill;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->getOutput()->progressStart(6);

        $this->command->info(' Creating Audit Assessments...');
        assessments::factory(3)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Adding System Qualifications...');
        qualification::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Users...');
        User::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit jcp...');
        jcp::factory(5)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Skill Categories...');
        category::factory(4)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Skills and associating with jcp...');
        $skills = skill::factory(20)->create();
        jcp::All()->each(function ($jcp) use ($skills) {
            $jcp->skills()->saveMany($skills);
        });
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Enrolling Users to Assessments...');
        enrollment::factory(10)->create();

        $this->command->getOutput()->progressFinish();


    }
}
