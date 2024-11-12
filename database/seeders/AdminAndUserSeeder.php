<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AdminAndUserSeeder extends Seeder
{
    public function run()
    {
        // Ensure roles exist
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'User']);
        Role::firstOrCreate(['name' => 'President']);
        Role::firstOrCreate(['name' => 'Vice-President']);
        Role::firstOrCreate(['name' => 'Secretary']);
        Role::firstOrCreate(['name' => 'Treasurer']);
        Role::firstOrCreate(['name' => 'PIO']);

        // Create Admin User
        $adminUser = User::create([
            'name' => 'Jam',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole('Admin');

        // Create President User
        $presidentUser = User::create([
            'name' => 'Rey Rameses Jude S Macalutas III',
            'email' => 'president@president.com',
            'password' => bcrypt('password'),
            'account_expires_at' => Carbon::now()->addDays(150), // Set expiry date
        ]);
        $presidentUser->assignRole('President');

        // Create Vice-President User
        $vicePresidentUser = User::create([
            'name' => 'Brynth Dave Gunayan',
            'email' => 'vpresident@vpresident.com',
            'password' => bcrypt('password'),
            'account_expires_at' => Carbon::now()->addDays(150), // Set expiry date
        ]);
        $vicePresidentUser->assignRole('Vice-President');

        // Create Secretary User
        $secretaryUser = User::create([
            'name' => 'Kirk John Sieras',
            'email' => 'secretary@secretary.com',
            'password' => bcrypt('password'),
            'account_expires_at' => Carbon::now()->addDays(150), // Set expiry date
        ]);
        $secretaryUser->assignRole('Secretary');

        // Create Treasurer User
        $treasurerUser = User::create([
            'name' => 'Winston Mansueto',
            'email' => 'treasurer@treasurer.com',
            'password' => bcrypt('password'),
            'account_expires_at' => Carbon::now()->addDays(150), // Set expiry date
        ]);
        $treasurerUser->assignRole('Treasurer');

        // Create PIO User
        $pioUser = User::create([
            'name' => 'Maverick Fama',
            'email' => 'pio@pio.com',
            'password' => bcrypt('password'),
            'account_expires_at' => Carbon::now()->addDays(150), // Set expiry date
        ]);
        $pioUser->assignRole('PIO');
    }
}
