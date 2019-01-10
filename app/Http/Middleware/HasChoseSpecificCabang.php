<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class HasChoseSpecificCabang
{
  // this middleware is to redirect users if they already chose cabang_spesifik
  // to prevent double registering
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->cabang_spesifik) {
          return redirect('users');
        }
        return $next($request);
    }
}
