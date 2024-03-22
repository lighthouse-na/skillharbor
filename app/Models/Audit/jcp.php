<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class jcp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assessment()
    {
        return $this->belongsTo(assessments::class, 'assessment_id');
    }
    public function skills()
    {
        return $this->belongsToMany(skill::class)->withPivot('user_rating', 'supervisor_rating');
    }

public function qualifications(){
    return $this->belongsToMany(qualification::class, 'jcp_qualification');

}
}
