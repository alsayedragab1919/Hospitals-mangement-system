<?php

namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MyEvents implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $patient_id;
    public $invoice_id;
    public function __construct($data)
    {
      $patient =  Patient::find($data['patient_id']);
        $this->patient_id = $patient->name;
        $this->invoice_id = $data['invoice_id'];;
    }

   
    public function broadcastOn()
    {
        return ['my-channel'];

    }
}
