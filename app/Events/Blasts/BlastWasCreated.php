<?php

namespace App\Events\Blasts;

use App\Http\Resources\BlastResource;
use App\Models\Blast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlastWasCreated implements ShouldBroadcast
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
        return (new BlastResource($this->blast))->jsonSerialize();
    }

    public function broadcastAs(){
        return 'BlastWasCreated';
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->blast->user->followers->map(function($user){
            return new PrivateChannel('cronologie.' . $user->id);
        })->toArray();
    }
}
