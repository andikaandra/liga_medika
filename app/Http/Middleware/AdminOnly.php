<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == 2) {
            return $next($request);
        }
        if ($request->ajax()) {
          return response()->json(['message' => 'unauthorised'], 401);
        }
        return redirect('/');
    }
}
