<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckAccountExpiry
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        $user = auth()->user();

        // If user exists and has an expiry date
        if ($user && $user->account_expires_at) {
            // Check if the account expiry date has passed
            if (Carbon::now()->greaterThan($user->account_expires_at)) {
                // Log the expiry event for auditing purposes
                Log::warning("User account expired: {$user->id}, Email: {$user->email}");

                // Log the user out
                auth()->logout();

                // Redirect to login with an expiry message
                return redirect()->route('login')->withErrors(['Your account has expired. Please contact support.']);
            }
        }

        // If account expiry check passes, allow the request to continue
        return $next($request);
    }
}


