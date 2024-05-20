<?php

namespace Database\Seeders;

use App\Models\Audit\assessment;
use App\Models\Audit\category;
use App\Models\Audit\enrollment;
use App\Models\Audit\jcp;
use App\Models\Audit\prerequisite;
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
        $this->command->getOutput()->progressStart(10);

        $this->command->info(' Creating Audit Assessments...');
        assessment::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Adding System Qualifications...');
        qualification::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Prerequisites...');
        prerequisite::factory(19)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Users...');
        User::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit jcp...');
        jcp::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Skill Categories...');
        category::factory(5)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Skills and associating with jcp...');
        $skills = skill::factory(20)->create();
        $jcps = jcp::All()->each(function ($jcp) use ($skills) {
            $jcp->skills()->saveMany($skills);
        });
        $this->command->getOutput()->progressAdvance();


        $this->command->info(' Assigning Prerequisites to jcps...');
        $prerequisites = prerequisite::all();
        foreach ($jcps as $jcp) {
            $jcp->prerequisites()->saveMany($prerequisites);
        }
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Enrolling Users to Assessments...');
        $users = User::all();
        $assessments = assessment::all();

        foreach ($users as $index => $user) {
            $assessment_id = $assessments[$index % $assessments->count()]->id;

            // Check if the user is already enrolled in the assessment
            $existingEnrollment = enrollment::where('user_id', $user->id)
                                            ->where('assessment_id', $assessment_id)
                                            ->first();

            // If the user is not already enrolled, create the enrollment
            if (!$existingEnrollment) {
                enrollment::factory()->create([
                    'user_id' => $user->id,
                    'assessment_id' => $assessment_id,
                ]);
            }
        }
        $this->command->getOutput()->progressAdvance();


        $this->command->info(' Assigning Qualifications to Users...');
        $qualifications = qualification::all();

        foreach ($users as $user) {
            $user->qualifications()->saveMany($qualifications);
        }

        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Assigning Qualifications to jcps...');
        $jcps = jcp::all();

        foreach ($jcps as $jcp) {
            $jcp->qualifications()->saveMany($qualifications);
        }




        $this->command->getOutput()->progressFinish();


    }
}
