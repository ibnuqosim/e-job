<?php

namespace App\Listeners;

use App\Events\JobdescApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobdescEmailNotification;

class SendApprovalEmailNotif
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobdescApproved  $event
     * @return void
     */
    public function handle(JobdescApproved $event)
    {
        $to = $event->jobdesc->nikapprove()->first();

        Mail::to($to->email)
            ->send(new JobdescEmailNotification($event->jobdesc));
    }
}
