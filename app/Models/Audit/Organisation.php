<?php

namespace App\Models\Audit;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organisation extends Model
{
    use HasFactory;


    public function getEmployeeCount()
    {
        return User::count();

    }

    public function getGenderSplit()
    {
        $genderCounts = User::select(DB::raw('gender, COUNT(*) as count'))
                            ->groupBy('gender')
                            ->get()
                            ->pluck('count', 'gender')
                            ->toArray();

        return $genderCounts;
    }

    public function getEmployeeTypeSplit()
    {
        return User::select(DB::raw('role, COUNT(*) as count'))
                    ->groupBy('role')
                    ->get()
                    ->pluck('count' , 'role')
                    ->toArray();
    }

    public function getAgeDistribution()
    {
        $ageGroups = User::select(DB::raw("
            CASE
                WHEN (strftime('%Y', 'now') - strftime('%Y', dob)) - (strftime('%m-%d', 'now') < strftime('%m-%d', dob)) < 20 THEN 'Under 20'
                WHEN (strftime('%Y', 'now') - strftime('%Y', dob)) - (strftime('%m-%d', 'now') < strftime('%m-%d', dob)) BETWEEN 20 AND 29 THEN '20-29'
                WHEN (strftime('%Y', 'now') - strftime('%Y', dob)) - (strftime('%m-%d', 'now') < strftime('%m-%d', dob)) BETWEEN 30 AND 39 THEN '30-39'
                WHEN (strftime('%Y', 'now') - strftime('%Y', dob)) - (strftime('%m-%d', 'now') < strftime('%m-%d', dob)) BETWEEN 40 AND 49 THEN '40-49'
                WHEN (strftime('%Y', 'now') - strftime('%Y', dob)) - (strftime('%m-%d', 'now') < strftime('%m-%d', dob)) BETWEEN 50 AND 59 THEN '50-59'
                ELSE '60+'
            END as age_range,
            COUNT(*) as count
        "))
        ->groupBy('age_range')
        ->pluck('count', 'age_range')
        ->toArray();
        return $ageGroups;

    }

    public function getCompletedAssessments($id)
    {
        $totalAssessments = enrollment::where('assessment_id',$id)->count();
        $completedAssessments = enrollment::where('assessment_id', $id)
                                          ->where('user_status', 1)
                                          ->where('supervisor_status', 1)
                                          ->count();

        return [
            'total' => $totalAssessments,
            'completed' => $completedAssessments,
            'percentage' => $totalAssessments > 0 ? ($completedAssessments / $totalAssessments) * 100 : 0,
        ];
    }

    public function getCompanySkillGap()
    {
        $requiredLevels = DB::table('jcp_skill')->sum('required_level');
        $userLevels = DB::table('jcp_skill')->sum('user_rating');
        $supervisorLevels = DB::table('jcp_skill')->sum('supervisor_rating');

        return [
            'required_levels' => $requiredLevels,
            'user_levels' => $userLevels,
            'supervisor_levels' => $supervisorLevels,
        ];
    }

    public function getTopPerformers($limit = 10)
    {
        return User::with('skills')
                   ->get()
                   ->sortByDesc(function ($user) {
                       return $user->skills->sum(function ($skill) {
                           return max($skill->user_rating, $skill->supervisor_rating);
                       });
                   })
                   ->take($limit);
    }

    public function getLowPerformers($limit = 10)
    {
        return User::with('skills')
                   ->get()
                   ->sortBy(function ($user) {
                       return $user->skills->sum(function ($skill) {
                           return max($skill->user_rating, $skill->supervisor_rating);
                       });
                   })
                   ->take($limit);
    }
}
