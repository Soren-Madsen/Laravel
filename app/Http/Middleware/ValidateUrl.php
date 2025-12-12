<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     * If the `img_url` input is present and invalid, redirect to welcome page with an error.
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->input('img_url');

        if ($url) {
            // Basic URL validation
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                return redirect('/')->with('error', 'La URL de la imagen no es válida.');
            }

            // Optional: enforce http(s) scheme
            $scheme = parse_url($url, PHP_URL_SCHEME);
            if (!in_array($scheme, ['http', 'https'])) {
                return redirect('/')->with('error', 'La URL de la imagen debe usar http o https.');
            }

            // Optional: allow only certain hosts (example)
            // $host = parse_url($url, PHP_URL_HOST);
            // $allowed = ['example.com', 'images.example.com'];
            // if (!in_array($host, $allowed)) {
            //     return redirect('/')->with('error', 'Host no permitido para la URL de la imagen.');
            // }
        }

        return $next($request);
    }
}
