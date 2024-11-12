<?php

// app/Console/Commands/SetAccountExpiry.php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SetAccountExpiry extends Command
{
    protected $signature = 'user:set-expiry {userId?} {expiryDate?}';
    protected $description = 'Set the account expiry date for a user';

    public function handle()
    {
        $userId = $this->argument('userId');
        $expiryDate = $this->argument('expiryDate') ?? Carbon::now()->addDays(30); // Default to 30 days if not specified

        // If a user ID is provided, set expiry for a single user
        if ($userId) {
            $user = User::findOrFail($userId);
            $user->update(['account_expires_at' => $expiryDate]);
            $this->info("Account expiry set for {$user->name} until {$expiryDate->toDateString()}");
        } else {
            // If no user ID, set expiry for all users
            $users = User::all();
            foreach ($users as $user) {
                $user->update(['account_expires_at' => $expiryDate]);
            }
            $this->info("All users' accounts set to expire on {$expiryDate->toDateString()}");
        }
    }
}
