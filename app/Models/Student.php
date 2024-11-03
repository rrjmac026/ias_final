<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'student_id',
        'year_level',
        'phone',
    ];

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_memberships')->withTimestamps();
    }

    public function roles()
    {
        return $this->hasMany(ClubRole::class);
    }
}

