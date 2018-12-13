<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class HasVerifiedByAdmin
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
      if (Auth::user()->lomba_verified==1) {
        return $next($request);
      }
      if ($request->ajax()) {
        return response()->json(['message' => 'unauthorised.'], 401);
      }
        return $next($request);
    }
}
