<?php

use App\Models\User;
use App\Models\Audit\assessment as Assessment;
use App\Models\Audit\category;
use App\Models\Audit\enrollment;
use App\Models\Audit\jcp;
use App\Models\Audit\qualification;
use App\Models\Audit\skill;
use Illuminate\Support\Facades\Crypt;

use function Pest\Laravel\get;

test('the assessments page can be accessed', function () {
    $this->actingAs($user = User::factory()->create());

    $encryptedId = Crypt::encrypt($user->id);

    $response = get(route('user.assessment', ['user' => $encryptedId]));

    $response->assertOk();
    $response->assertViewIs('assessments.index');
    $response->assertViewHas('assessments');
    $response->assertViewHas('user', $user);
});

test('the assessment details can be displayed on the assessment details page', function () {
    // Create an authenticated user
    $this->actingAs($user = User::factory()->create());

    // Encrypt the user's ID for the route
    $encryptedId = Crypt::encrypt($user->id);

    // Create an assessment for the user
    $assessment = Assessment::factory()->create();
    $enrollment = enrollment::factory()->create([
        'user_id' => $user->id,
        'assessment_id' => $assessment->id,
    ]);
    // Create a JCP for the user
    $userJCP = Jcp::factory()->create(['user_id' => $user->id]);

    // Create skill categories and associate skills with the JCP
    $skillCategories = category::factory(5)->create();
    $skills = skill::factory(20)->create();

    // Attach skills to the JCP with required levels
    $skills->each(function ($skill) use ($userJCP) {
        $userJCP->skills()->attach($skill->id, [
            'required_level' => rand(1, 5),
        ]);
    });

    // Act: Make a GET request to the assessment details page
    $response = $this->get(route('user.assessment.show', [
        'user' => $encryptedId,
        'assessment' => Crypt::encrypt($assessment->id),
    ]));

    // Assert: Check that the response is OK and the view is correct
    $response->assertOk();
    $response->assertViewIs('assessments.show');
    $response->assertViewHas('user', $user);
    $response->assertViewHas('assessment', $assessment);
    $response->assertViewHas('jcp', function ($jcp) use ($userJCP) {
        return $jcp->id === $userJCP->id;
    });
});

test('a user can complete their assessment', function () {
    // Create an authenticated user
    $this->actingAs($user = User::factory()->create());

    // Create an assessment and link it to the user via enrollments
    $assessment = Assessment::factory()->create();
    $user->enrolled()->attach($assessment->id, [
        'user_status' => 0,
        'supervisor_status' => 0,
    ]);

    // Create a JCP for the user
    $userJCP = Jcp::factory()->create(['user_id' => $user->id]);
    $skillCategories = category::factory(5)->create();

    // Create skills and associate them with the JCP
    $skills = skill::factory(5)->create();
    $skills->each(function ($skill) use ($userJCP) {
        $userJCP->skills()->attach($skill->id, ['required_level' => rand(1, 5)]);
    });

    // Simulate user responses to the skills
    $responses = $skills->mapWithKeys(fn($skill) => [$skill->id => rand(1, 5)])->toArray();

    // Send a POST request to store the assessment results
    $response = $this->post(route('user.assessment.storeEmployee', [
        'user' => $user->id,
        'assessment' => $assessment->id,
        'jcp' => $userJCP->id,
    ]), [
        'questions' => $responses,
    ]);

    // Assert the response redirects with success
    $response->assertRedirect(route('dashboard', [
        'user' => $user->id,
        'assessment' => $assessment->id,
        'jcp' => $userJCP->id,
    ]));
    $response->assertSessionHas('success', 'Answers submitted successfully!');

    // Assert that the skill responses were stored in the pivot table
    foreach ($responses as $skillId => $userRating) {
        $this->assertDatabaseHas('jcp_skill', [
            'jcp_id' => $userJCP->id,
            'skill_id' => $skillId,
            'user_rating' => $userRating,
        ]);
    }

    // Assert that the user's competency rating was updated
    $maxScore = count($responses) * 5;
    $expectedRating = round((array_sum($responses) / $maxScore) * 100);
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'competency_rating' => $expectedRating,
    ]);

    // Assert that the enrollment's user_status was updated
    $this->assertDatabaseHas('enrollments', [
        'user_id' => $user->id,
        'assessment_id' => $assessment->id,
        'user_status' => 1,
    ]);
});

test('a user can view their completed assessment results', function () {
    // Create an authenticated user
    $this->actingAs($user = User::factory()->create());

    // Create an assessment and link it to the user via enrollments
    $assessment = Assessment::factory()->create();
    $user->enrolled()->attach($assessment->id, [
        'user_status' => 1, // Mark the assessment as completed
        'supervisor_status' => 0,
    ]);

    // Create a JCP for the user
    $userJCP = Jcp::factory()->create(['user_id' => $user->id]);
    $skillCategories = category::factory(5)->create();

    // Create skills and associate them with the JCP
    $skills = skill::factory(5)->create();
    $skills->each(function ($skill) use ($userJCP) {
        $userJCP->skills()->attach($skill->id, [
            'required_level' => rand(1, 5),
            'user_rating' => rand(1, 5),
        ]);
    });

    // Create qualifications and associate them with the JCP and user
    $qualifications = qualification::factory(2)->create();
    $qualifications->each(function ($qualification) use ($userJCP, $user) {
        $userJCP->qualifications()->attach($qualification->id);
        $user->qualifications()->attach($qualification->id); // Assume user has acquired all qualifications
    });

    // Send a GET request to the results page
    $response = $this->get(route('user.assessment.results', [
        'user' => Crypt::encrypt($user->id),
        'assessment' => Crypt::encrypt($assessment->id),
    ]));

    // Assert the response is OK and the correct view is rendered
    $response->assertOk();
    $response->assertViewIs('assessments.results');

    // Assert the view contains the expected data
    $response->assertViewHas('user', fn($u) => $u->id === $user->id);
    $response->assertViewHas('assessment', fn($a) => $a->id === $assessment->id);
    $response->assertViewHas('jcp', fn($j) => $j->id === $userJCP->id);
    $response->assertViewHas('qualificationsData', function ($qualificationsData) use ($qualifications) {
        return count($qualificationsData) === $qualifications->count() &&
               collect($qualificationsData)->every(fn($q) => in_array($q['name'], $qualifications->pluck('qualification_title')->toArray()));
    });

    // Assert that the required JCP data is included
    $response->assertSee($user->first_name);
    foreach ($skills as $skill) {
        $response->assertSee($skill->skill_title);
    }
});
