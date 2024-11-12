<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_at',
    ];

    // Encrypt 'name' before saving to the database
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    // Decrypt 'name' when accessing from the database
    public function getNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Encrypt 'description' before saving to the database
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    // Decrypt 'description' when accessing from the database
    public function getDescriptionAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function members()
    {
        return $this->belongsToMany(Student::class, 'club_memberships')->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
