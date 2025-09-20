<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CookieManager
{
    public function handle(Request $request, Closure $next)
    {
        // Set a new cookie if not already present
        if (!Cookie::has('user_preferences')) {
            Cookie::queue(Cookie::make('user_preferences', json_encode(['theme' => 'dark', 'language' => 'en']), 60 * 24 * 30));
        }

        // Read the cookie if it exists
        $userPreferences = Cookie::get('user_preferences');

        if ($userPreferences) {
            $preferences = json_decode($userPreferences, true);
            Log::info('User Preferences:', $preferences);
        }

        // Check for a specific cookie to be deleted
        if ($request->has('remove_cookie')) {
            Cookie::queue(Cookie::forget('user_preferences'));
            
            // Set flash message to indicate cookie removal
            Session::flash('cookie_removed', 'Cookie has been successfully removed.');
        }

        return $next($request);
    }
}
