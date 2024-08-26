<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use SerializesModels;

    public $message;
    public $sender;
    public $recipient;

    public function __construct(Message $message, User $sender, User $recipient)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->recipient = $recipient;
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('chat.' . $this->sender->id),
            new PrivateChannel('chat.' . $this->recipient->id),
        ];
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }
}
