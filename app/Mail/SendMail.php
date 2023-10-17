<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $toEmail, $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $toEmail, $data)
    {
        $this->subject = $subject;
        $this->toEmail = $toEmail;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.forget_password', $this->data)
                ->subject($this->subject)
                ->from("nguyentuvan.vnnnnt@gmail.com")
                ->to($this->toEmail);
    }
}
