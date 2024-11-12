<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Student;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $student = Student::first();  // Assume you already have a student in the database

        Invoice::create([
            'student_id' => $student->id,
            'amount' => 1500,
            'status' => 'paid',
            'description' => 'Tuition fee for the semester',
        ]);

        Invoice::create([
            'student_id' => $student->id,
            'amount' => 1200,
            'status' => 'unpaid',
            'description' => 'Library fee for the semester',
        ]);
    }
}
