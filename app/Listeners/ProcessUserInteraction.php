<?php

namespace App\Listeners;
use App\Jobs\ProcessUserInteractions;
use App\Events\UserInteractedWithOffres;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessUserInteraction
{
    
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(UserInteractedWithOffres $event): void
    {
        ProcessUserInteractions::dispatch($event->user);
    }

   
}
