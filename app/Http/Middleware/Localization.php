<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale') && session()->get('locale')!='en') {
            App::setLocale(session()->get('locale'));
            session()->put('localeDB', '_'.session()->get('locale'));
        }else{
            session()->put('localeDB', '');
        }
        return $next($request);
    }
}

