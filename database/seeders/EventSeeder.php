<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Club;

class EventSeeder extends Seeder
{
    public function run()
    {
        $club = Club::first();  // Assume you already have a club in the database

        Event::create([
            'club_id' => $club->id,
            'name' => 'Annual General Meeting',
            'description' => 'Meeting for all club members',
            'event_date' => now()->addDays(10),
            'location' => 'Room 101, Main Building',
        ]);

        Event::create([
            'club_id' => $club->id,
            'name' => 'Workshop on Coding',
            'description' => 'Workshop for learning basic coding skills',
            'event_date' => now()->addWeeks(2),
            'location' => 'Lab 5, Tech Building',
        ]);
    }
}
