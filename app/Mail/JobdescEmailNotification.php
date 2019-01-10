<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\jobdescreate;

class JobdescEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

public $jobdesc;

    public function __construct(jobdescreate $jobdesc)
    {
        $this->jobdesc = $jobdesc;
    }

    public function build()
    {
        return $this->from('e-job@krakatausteel.com')
        ->view('emails.jobdesc.approved', ['jobdesc' => $this->jobdesc]);
    }
}
