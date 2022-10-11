<?php

namespace App\Events\Blasts;

use App\Models\Blast;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlastLikesWereUpdate implements ShouldBroadcast
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
            'count' => $this->blast->likes->count(),
        ];
    }

    public function broadcastAs()
    {
        return 'BlastLikesWereUpdated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('blasts');
    }
}
