<?php

namespace App\Models;
use App\Models\Student;


use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        
        'student_id',
        'amount',
        'status',
        'description'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
}


