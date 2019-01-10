<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\jobdescreate;

class JobdescApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $jobdesc;
    public function __construct(jobdescreate $jobdesc)
    {
        $this->jobdesc = $jobdesc;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
