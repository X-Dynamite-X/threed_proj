<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatUserOneToOneEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $conversation_id = '';
    public $sender_user_id = '';
    public $receiver_user_id='' ;
    public $message_text='' ;
    public function __construct(string $conversation_id,string $sender_user_id, string $receiver_user_id,string $message_text)
    {
        $this->conversation_id = $conversation_id;
        $this->sender_user_id = $sender_user_id;
        $this->receiver_user_id =$receiver_user_id;
        $this->message_text =$message_text;
        }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return ['conversation' . $this->conversation_id ];

    }
    public function broadcastAs ():string
    {
        return 'chatuser';

    }
}
