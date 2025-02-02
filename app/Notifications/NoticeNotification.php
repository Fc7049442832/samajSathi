<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NoticeNotification extends Notification
{
    use Queueable;

    protected $notice;

    public function __construct($notice)
    {
        $this->notice = $notice;
    }

    public function via($notifiable)
    {
        return ['database']; // Save in DB
    }

    public function toDatabase($notifiable)
    {
        return [
            'header' => $this->notice->header,
            'message' => $this->notice->message,
            'media' => $this->notice->media,
        ];
    }
}
