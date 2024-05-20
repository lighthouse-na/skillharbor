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
        return User::select(DB::raw('gender, COUNT(*) as count'))
                    ->groupBy('gender')
                    ->get();
    }

    public function getEmployeeTypeSplit()
    {
        return User::select(DB::raw('role, COUNT(*) as count'))
                    ->groupBy('role')
                    ->get();
    }

    public function getAgeDistribution()
    {
        return User::select(DB::raw('dob, COUNT(*) as count'))
                    ->get()
                    ->groupBy(function ($user) {
                        return match (true) {
                            $user->age < 20 => 'Under 20',
                            $user->age < 30 => '20-29',
                            $user->age < 40 => '30-39',
                            $user->age < 50 => '40-49',
                            $user->age < 60 => '50-59',
                            default => '60+',
                        };
                    })
                    ->map(function ($group) {
                        return count($group);
                    });
    }

    public function getCompletedAssessments()
    {
        $totalAssessments = jcp::where('is_active' , 1)->count();
        $completedAssessments = jcp::whereNotNull('completed_at')->count();

        return [
            'total' => $totalAssessments,
            'completed' => $completedAssessments,
            'percentage' => $totalAssessments > 0 ? ($completedAssessments / $totalAssessments) * 100 : 0,
        ];
    }

    public function getCompanySkillGap()
    {
        $requiredLevels = DB::table('jcp_skills')->sum('required_level');
        $userLevels = DB::table('jcp_skills')->sum('user_rating');
        $supervisorLevels = DB::table('jcp_skills')->sum('supervisor_rating');

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
