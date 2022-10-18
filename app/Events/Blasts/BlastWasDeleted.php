<?php

namespace App\Events\Blasts;

use App\Models\Blast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlastWasDeleted implements ShouldBroadcast
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

    public function broadcastWith(){
        return [
            'id' => $this->blast->id
        ];
    }

    public function broadcastAs(){
        return 'BlastWasDeleted';
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('blasts');
    }
}
