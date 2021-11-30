<?php

namespace App\Jobs;

use App\Mail\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Auth;

class SendEmailQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $email_address;
    protected $data;
    protected $from_email;
    public function __construct($email_address, $data)
    {
        $this->from_email=Auth::user()->email;
        $this->email_address = $email_address['email'];
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::to($this->email_address)->send(new EmailTemplate($this->data, $this->from_email));
    }
}
