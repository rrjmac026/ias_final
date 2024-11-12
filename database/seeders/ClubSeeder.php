<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    public function run()
    {
        Club::create([
            'name' => 'Tech Club',
            'description' => 'A club for technology enthusiasts',
        ]);

        Club::create([
            'name' => 'Sports Club',
            'description' => 'A club for athletes and sports lovers',
        ]);
    }
}
