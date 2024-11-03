<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMembership extends Model
{
    use HasFactory;

    protected $table = 'club_memberships';

    protected $fillable = [
        'student_id',
        'club_id',
        'joined_at',
        'role'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}

