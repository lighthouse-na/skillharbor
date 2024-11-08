<?php
namespace Database\Seeders;

use App\Models\Audit\assessment;
use App\Models\Audit\category;
use App\Models\Audit\Department;
use App\Models\Audit\Division;
use App\Models\Audit\enrollment;
use App\Models\Audit\jcp;
use App\Models\Audit\prerequisite;
use App\Models\Audit\qualification;
use App\Models\Audit\skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->getOutput()->progressStart(12);

        $this->command->info(' Creating Organisation...');
        Division::factory(6)->create();
        $this->command->getOutput()->progressAdvance();

        Department::factory(10)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Assessments...');
        assessment::factory(1)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Adding System Qualifications...');
        qualification::factory(1)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Prerequisites...');
        prerequisite::factory(19)->create();
        $this->command->getOutput()->progressAdvance();

        User::factory()->create([
            'first_name' => 'Groot',
            'last_name' => 'Man',
            'email' => 'grootman@skillharbor.com',
            'salary_ref_number' => 000210,
            'department_id' => 1,
            'gender' => 'male',
            'dob' => fake()->date(),
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' =>  Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $this->command->info(' Creating Users...');
        User::factory(20)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit jcp...');
        jcp::factory(20)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Skill Categories...');
        category::factory(5)->create();
        $this->command->getOutput()->progressAdvance();

        $this->command->info(' Creating Audit Skills and associating with jcp...');
        $skills = skill::factory(20)->create();
        $jcps = jcp::all()->each(function ($jcp) use ($skills) {
            $skills->each(function ($skill) use ($jcp) {
                $jcp->skills()->attach($skill->id, ['required_level' => rand(1, 5)]);
            });
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
            if (! $existingEnrollment) {
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
