<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClubMembership;
use App\Models\Student;
use App\Models\Club;

class ClubMembershipSeeder extends Seeder
{
    public function run()
    {
        // Check if a student exists, if not, create a dummy student
        $student = Student::first();
        if (!$student) {
            $student = Student::create([
                'name' => 'Test Student',
                'email' => 'teststudent@example.com',
                'student_id' => 'S12345',
                'year_level' => 'Freshman',
                'phone' => '123-456-7890',
            ]);
        }

        // Check if a club exists, if not, create a dummy club
        $club = Club::first();
        if (!$club) {
            $club = Club::create([
                'name' => 'Test Club',
                'description' => 'This is a test club.',
                'created_at' => now(),
            ]);
        }

        // Create the club membership record
        ClubMembership::create([
            'student_id' => $student->id,
            'club_id' => $club->id,
            'joined_at' => now(),
            'role' => 'Member',
        ]);
    }
}
