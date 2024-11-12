<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    // Encrypt data before saving to the database
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = Crypt::encryptString($value);
    }

    // Decrypt data when accessing from the database
    public function getRoleAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
