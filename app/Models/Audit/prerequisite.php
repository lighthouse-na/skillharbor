<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prerequisite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jcp()
    {
        return $this->belongsToMany(jcp::class, 'jcp_prerequisites');
    }
}
