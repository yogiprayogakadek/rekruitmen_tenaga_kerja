<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLoggedInOperator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $isLoggendInOperator = (Auth::guard('weboperator')->check());
        $isLoggendIn = (Auth::check());
        // if(!$isLoggendIn) {
            if(!$isLoggendInOperator) {
                return redirect()->route('cpanel.index');
            }
            // return redirect()->back();
        // }

        return $next($request);
    }
}
