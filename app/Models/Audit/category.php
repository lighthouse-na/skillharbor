<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function skills()
    {
        return $this->hasMany(skill::class, 'skill_category_id');
    }
}
