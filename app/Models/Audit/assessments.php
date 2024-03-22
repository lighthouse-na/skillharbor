<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessments extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jcp()
    {
        return $this->hasMany(jcp::class, 'assessment_id');

    }
}
