<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    // Define custom accessors and mutators for encrypted fields
    // Encrypt the data before storing it in the database
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Crypt::encryptString($value);
    }

    public function setStudentIdAttribute($value)
    {
        $this->attributes['student_id'] = Crypt::encryptString($value);
    }

    public function setYearLevelAttribute($value)
    {
        $this->attributes['year_level'] = Crypt::encryptString($value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = Crypt::encryptString($value);
    }

    // Decrypt the data when accessing it from the database
    public function getNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getEmailAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getStudentIdAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getYearLevelAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getPhoneAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_memberships')->withTimestamps();
    }

    public function roles()
    {
        return $this->hasMany(ClubRole::class);
    }
}
