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

    public function scopeSearch($query, $search)
    {
        return $query->where('assessment_title', 'like', '%'.$search.'%');
    }
}
