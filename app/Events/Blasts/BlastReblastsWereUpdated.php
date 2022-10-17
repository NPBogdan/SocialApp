<?php

namespace App\Events\Blasts;

use App\Models\Blast;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlastReblastsWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;
    protected $blast;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Blast $blast)
    {
        $this->blast = $blast;
        $this->user = $user;
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->blast->id,
            'user_id' => $this->user->id,
            'count' => $this->blast->reblasts->count(),
        ];
    }

    public function broadcastAs()
    {
        return 'BlastReblastsWereUpdated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('blasts');
    }
}
