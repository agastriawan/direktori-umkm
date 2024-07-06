<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class SecureXsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->hasCookie('XSRF-TOKEN')) {
            $cookieValue = Cookie::get('XSRF-TOKEN');

            // Retrieve session configuration
            $sessionConfig = config('session');

            // Determine if secure flag should be set
            // $secure = $sessionConfig['secure'] ?? false;

            // dd($sessionConfig);

            // Set the XSRF-TOKEN cookie with HttpOnly and SameSite attributes
            $response->headers->setCookie(
                Cookie::make(
                    'XSRF-TOKEN',
                    $cookieValue,
                    0, // Expires at end of session
                    $sessionConfig['path'],
                    $sessionConfig['domain'],
                    ,
                    true, // HttpOnly flag
                    false, // Raw
                    'Strict' // SameSite attribute
                )
            );
        }

        return $response;
    }
}
