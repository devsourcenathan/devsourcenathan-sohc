<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->data['name'];
        $email = $this->data['email'];
        $body = $this->data['message'];
        return $this->from($email)->to("site.sohc@gmail.com")->subject("Nouveau message provenant de $email")->view('emails.contact-form', compact('name', 'email', 'body'));
    }
}
