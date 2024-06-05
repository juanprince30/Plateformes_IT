<?php

namespace App\Events;
use App\Models\User;
use App\Models\Offre;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserInteractedWithOffres
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $offre;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Opportunity $opportunity
     * @return void
     */
    public function __construct(User $user, Offre $offre)
    {
        $this->user = $user;
        $this->offre = $offre;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
