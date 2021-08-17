<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingTest extends Mailable
{
    use Queueable, SerializesModels;

    public $url ='http://booking_app.test';
    public $data = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $user)
    {
        $this->data = $user;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('livewire.emails.index');
    }
}
