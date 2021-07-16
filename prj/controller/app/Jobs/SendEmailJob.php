<?php

namespace App\Jobs;

use App\Mail\LogMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $type;
    private $event;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type , $event)
    {
        $this->type = $type;
        $this->event= $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        sleep(30);
        Mail::to('farhad@gmail.com')->send(new LogMail($this->type));



    }
}
