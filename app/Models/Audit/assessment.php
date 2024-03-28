<?php

namespace App\Models\Audit;

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
    public function scopeSearch($query, $search)
    {
        return $query->where('assessment_title', 'like', '%' . $search . '%');
    }
}
