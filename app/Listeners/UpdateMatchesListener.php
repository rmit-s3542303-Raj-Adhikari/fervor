<?php

namespace App\Listeners;

use App\Events\UpdateMatches;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Matcher;


class UpdateMatchesListener
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
     * @param  UpdateMatches  $event
     * @return void
     */
    public function handle(UpdateMatches $event)
    {
        Matcher::UpdateAffectedMatches($event->user);        
    }
}
