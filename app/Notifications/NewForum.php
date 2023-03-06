<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class NewForum extends Notification
{
    use Queueable;
    public $forum;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($forum)
    {
        $this->forum = $forum;
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
    public function toDatabase($notifiable)
    {
        $user = User::find($this->forum->user_id);
        return [
            'name' =>$user->name,
            'email' =>$user->email,
            'message' =>"создал форум: ".$this->forum->title,
            'type' =>5
        ];
    }
}
