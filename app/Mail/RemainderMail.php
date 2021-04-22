<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemainderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     *
     */
    public $name;
    public $message;
    public function __construct($name,$message)
    {
      $this->name = $name;
      $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("bigirwak@gmail.com")
                    ->subject("Schedule Remainder")
                    ->markdown('mails.remainder')
                    ->with([
                      'name' => $this->name,
                      'message' => $this->message,
                  ]);
    }
}
