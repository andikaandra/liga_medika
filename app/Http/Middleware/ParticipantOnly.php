<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ParticipantOnly
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
      // user has to be logged in and participant
        if (Auth::user() && Auth::user()->role == 1) {
          return $next($request);
        } //check if request xhr
        else if ($request->ajax()) {
          return response()->json(['message' => 'unauthorised.'], 401);
        }
        else { //http request redirect to homepage
          return redirect('/');
        }

    }
}
