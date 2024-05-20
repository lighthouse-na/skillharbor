<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Audit\assessment;
use App\Models\Audit\jcp;
use App\Models\Audit\qualification;
use App\Models\Audit\skill;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [


    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jcp()
    {
        return $this->hasMany(jcp::class, 'user_id');
    }

    public function assessments()
    {
        return $this->belongsToMany(assessment::class, 'enrollments');
    }

    public function skills()
    {
        return $this->belongsToMany(skill::class, 'jcp_skill')->withPivot('user_rating', 'supervisor_rating');
    }

    public function qualifications()
    {
        return $this->belongsToMany(qualification::class, 'qualification_user');
    }

    public function enrolled()
    {
        return $this->belongsToMany(assessment::class, 'enrollments')->withPivot('user_status','supervisor_status');
    }



    // Search Scope Function
    public function scopeSearch($query, $val)
    {
        return $query
            ->where('first_name', 'like', '%' . $val . '%')
            ->orWhere('email', 'like', '%' . $val . '%')
            ->orWhere('last_name', 'like', '%' . $val . '%');

    }
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }
}
