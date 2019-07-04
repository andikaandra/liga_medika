<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class JoinFinal
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
      if (Auth::user()->status_lolos==1 || (Auth::user()->cabang==1 && Auth::user()->lomba_verified==1)) {
        return $next($request);
      }
      if ($request->ajax()) {
        return response()->json(['message' => 'unauthorised.'], 401);
      }
      return redirect('users');
    }
}
