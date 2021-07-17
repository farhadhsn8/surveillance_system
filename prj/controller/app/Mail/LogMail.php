<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogMail extends Mailable
{
    use Queueable, SerializesModels;

    private $type;
    private $image;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type , $image)
    {
        $this->type = $type;
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.emailBody')->subject('مشاهده رخداد')->with('type',$this->type)->with('image' , $this->image);
    }
}
