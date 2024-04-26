<?php

namespace App\Models\Audit;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qualification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jcp()
    {
        return $this->belongsToMany(jcp::class, 'jcp_qualification');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'qualification_user');
    }

    public function scopeSearch($query, $val)
    {
        $query->where('qualification_title', 'like', '%'.$val.'%');
    }
}
