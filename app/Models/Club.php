<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_at',
    ];

    public function members()
    {
        return $this->belongsToMany(Student::class, 'club_memberships')->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
