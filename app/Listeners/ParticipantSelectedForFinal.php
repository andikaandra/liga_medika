<?php

namespace App\Listeners;

use App\Jobs\SendParticipantFinalistEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ParticipantSelectedForFinal
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(\App\Events\ParticipantSelectedForFinal $event)
    {
        dispatch(new SendParticipantFinalistEmail($event->user));
    }
}
