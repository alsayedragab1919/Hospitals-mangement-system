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

class Invoices implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $patient;
    public $invoice_id;
    public $doctor_id;
    public $message;
    public $created_at;
    public function __construct($data)
    {
        $patient = Patient::find($data['patient']);
        $this->patient = $patient->name;
        $this->doctor_id = $data['doctor_id'];
        $this->invoice_id = $data['invoice_id'];
        $this->message = "كشف جديد : ";
        $this->created_at =date('Y-m-d H:i:s');
    }

   
    public function broadcastOn()
    {
        
        return new Channel('invoices.'.$this->doctor_id);
    
        
    }
    public function broadcastAs()
    {
        
     
      return 'invoices-event';
        
    }
   
}
