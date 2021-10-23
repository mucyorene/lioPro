<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authLio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('loggedUser') && ($request->path() !='/login' && $request->path() !='/registerDummy')) {
           return redirect('/login')->with('fail','You\'are not logged in');
        }

        if (session()->has('loggedUser') && ($request->path() =='/login' || $request->path() =='/registerDummy')) {
            return back();
         }
        return $next($request);
    }
}
