<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class checkLocaleForApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = array_values(config('translatable.locales'));
        if($request->hasHeader('lang') && in_array($request->header('lang') , $languages))
        {
            app()->setLocale($request->header('lang'));
        }
        return $next($request);
    }
}
