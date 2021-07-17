<?php

namespace App\Jobs;

use App\Mail\LogMail;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $type;
    private $image;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type , $image)
    {
        $this->type = $type;
        $this->image= $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        sleep(30);

        Mail::to('farhad@gmail.com')->send(new LogMail($this->type , $this->image));

        DB::table('events')->where('image',$this->image)->update([
            'done' => true
        ]);


    }
}
