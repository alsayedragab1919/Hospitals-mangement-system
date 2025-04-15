<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessages2 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;
    public $recever;
    public $conversation;
    public function __construct(Doctor $sender ,Message $message,Conversation $conversation , patient $recever)
    {
        $this->sender = $sender;
        $this->message = $message;
        $this->conversation = $conversation;
        $this->recever = $recever;

    }
    public function broadcastwith()
    {

        return[
            'sender_email' => $this->sender->email,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id,
            'receivere_email' => $this->recever->email,
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat2.'.$this->recever->id);
    }
}
