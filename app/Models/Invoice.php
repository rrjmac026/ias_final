<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Invoice extends Model
{
    protected $fillable = [
        'student_id',
        'amount',
        'status',
        'description'
    ];

    // Encrypt data before saving to the database
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = Crypt::encryptString($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Crypt::encryptString($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    // Decrypt data when accessing from the database
    public function getAmountAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getStatusAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getDescriptionAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
