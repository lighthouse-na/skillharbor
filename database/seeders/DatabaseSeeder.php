<?php

namespace Database\Seeders;

use App\Models\Audit\assessment;
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
        $this->command->getOutput()->progressStart(8);

        $this->command->info(' Creating Audit Assessments...');
        assessment::factory(3)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Adding System Qualifications...');
        qualification::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Users...');
        User::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit jcp...');
        jcp::factory(8)->create();
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
        $users = User::all();
        $assessments = assessment::all();

        foreach ($users as $index => $user) {
            enrollment::factory()->create([
                'user_id' => $user->id,
                'assessment_id' => $assessments[$index % $assessments->count()]->id,
            ]);
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

        $this->command->getOutput()->progressAdvance();



        $this->command->getOutput()->progressFinish();


    }
}
