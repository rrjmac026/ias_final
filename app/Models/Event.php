<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'name',
        'description',
        'event_date',
        'location',
    ];

    // Encrypt data before saving to the database
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = Crypt::encryptString($value);
    }

    // Decrypt data when accessing from the database
    public function getNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getDescriptionAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getLocationAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
