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

class SendMessages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;
    public $recever;
    public $conversation;
    public function __construct(Patient $sender ,Message $message,Conversation $conversation , Doctor $recever)
    {

        $this->sender = $sender;
        $this->message = $message;
        $this->recever = $recever;
        $this->conversation = $conversation;

    }

    public function broadcastwith()
    {

        return[
        'sender_email'=>$this->sender->email,
        'receiver_email'=>$this->recever->email,
        'message'=>$this->message->id
        ];
    }
    public function broadcastOn()
    {
        return new PrivateChannel('chat.'.$this->recever->id);
    }
}
