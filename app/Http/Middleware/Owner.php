<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {

        if (auth()->guest() || auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3 ) {

            Alert::error('forbidden', 'anda tidak memiliki akses');

            return redirect('/home');
        }
        return $next($request);
    }
}
