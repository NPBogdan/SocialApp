<?php

namespace App\Notifications\Blasts;

use App\Http\Resources\BlastResource;
use App\Http\Resources\UserResource;
use App\Models\Blast;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BlastLiked extends Notification
{
    use Queueable;
    protected $user;
    protected $blast;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( User $user,Blast $blast)
    {
        $this->blast=$blast;
        $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => new UserResource($this->user),
            'blast' => new BlastResource($this->blast),
        ];
    }
}
