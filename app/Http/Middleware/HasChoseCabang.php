<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
// this middleware is to check if user has chose a cabang
class HasChoseCabang
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
      if (Auth::user()->cabang) {
        return $next($request);
      }
      if ($request->ajax()) {
        return response()->json(['message' => 'unauthorised.'], 401);
      }
      return redirect('users');
    }
}
