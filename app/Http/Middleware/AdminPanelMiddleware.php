<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
        if (!Auth::user()->checkIsAdmin()) {
            return redirect()->route('welcome');
        }
        */
        if(auth()->user()==null OR auth()->user()->role!='admin')
        {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
