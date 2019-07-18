<?php

namespace App\Http\Middleware;

use App\INAMSC;
use App\Lomba;
use Closure;

class InamscPassiveParticipantEnoughQuota
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
        $lomba = Lomba::where('nama', 'Passive Participant')->first();
        if (INAMSC::where('type', 16)->count() >= $lomba->kuota || $lomba->status_pendaftaran==0) {
            return redirect('users');
        }
        return $next($request);
    }
}
