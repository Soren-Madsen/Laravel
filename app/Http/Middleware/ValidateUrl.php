<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     * Validate that a 'url' input is present and is a valid URL.
     * If not valid, redirect to welcome view with an error message.
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->input('img_url');

        if ($url) {
            // Basic URL validation
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                return redirect('/')->with('error', 'La URL proporcionada no es válida.');
            }

            // Enforce http(s) scheme
            $scheme = parse_url($url, PHP_URL_SCHEME);
            if (!in_array($scheme, ['http', 'https'])) {
                return redirect('/')->with('error', 'La URL debe usar http o https.');
            }
        }

        return $next($request);
    }
}
