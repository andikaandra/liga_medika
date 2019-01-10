<?php

namespace App\Http\Middleware;

use Closure;
use App\Lomba;
use App\INAMSC;

class InamscVideoEnoughQuota
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
        $lomba = Lomba::where('id',2)->first();
        if (INAMSC::where('type',2)->count() >= $lomba->kuota || $lomba->status_pendaftaran==0) {
          return redirect('users');
        }
        return $next($request);
    }
}
