<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'student_id' => 'S12345',
            'year_level' => '3',
            'phone' => '1234567890',
        ]);

        Student::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'student_id' => 'S54321',
            'year_level' => '2',
            'phone' => '0987654321',
        ]);
    }
}
