<?php

namespace App\Models\Audit;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jcp()
    {
        return $this->hasMany(jcp::class, 'assessment_id');

    }

    public function enrolled()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'assessment_id', 'user_id')
            ->withPivot('user_status', 'supervisor_status');
    }
    public function getEnrolledDepartmentIds()
    {
        // Get the IDs of the departments for users enrolled in this assessment
        return $this->enrolled()
            ->with('department') // Ensure you load the department relationship
            ->get()
            ->pluck('department.id') // Get the department IDs
            ->unique() // Ensure uniqueness
            ->toArray(); // Convert to array
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('assessment_title', 'like', '%'.$search.'%');
    }
}
