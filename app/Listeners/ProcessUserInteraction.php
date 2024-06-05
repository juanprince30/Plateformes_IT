<?php

namespace App\Listeners;
use App\Jobs\ProcessUserInteractions;
use App\Events\UserInteractedWithOffres;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessUserInteraction
{


    public function handle(UserInteractedWithOffres $event): void
    {
        Log::info('Event UserInteractedWithOpportunity triggered for user: ' . $event->user->id);
        ProcessUserInteractions::dispatch($event->user);
    }

   
}
