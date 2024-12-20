<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
            $this->call(AdminAndUserSeeder::class);
            $this->call(RoleSeeder::class);
            // $this->call(AdminSeeder::class);
            $this->call(ClubMembershipSeeder::class);
            $this->call(EventSeeder::class);
            $this->call(StudentSeeder::class);
            $this->call(ClubSeeder::class);
            $this->call(InvoiceSeeder::class);
            $this->call(RolePermissionSeeder::class);

        User::factory()->create([
            
        ]);
    }
}
