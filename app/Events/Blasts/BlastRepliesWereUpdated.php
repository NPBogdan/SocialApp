<?php

namespace App\Events\Blasts;

use App\Models\Blast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlastRepliesWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $blast;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Blast $blast)
    {
        $this->blast = $blast;
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->blast->id,
            'count' => $this->blast->replies->count(),
        ];
    }

    public function broadcastAs()
    {
        return 'BlastRepliesWereUpdated';
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
