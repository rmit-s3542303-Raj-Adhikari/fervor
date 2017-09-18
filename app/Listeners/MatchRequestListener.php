<?php

namespace App\Listeners;

use App\Events\Event;
use App\Events\MatchRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Services\Matcher;

class MatchRequestListener
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
     * @param  Event  $event
     * @return void
     */
    public function handle(MatchRequest $event)
    {
        Matcher::MatchAll($event->user);
    }
}
