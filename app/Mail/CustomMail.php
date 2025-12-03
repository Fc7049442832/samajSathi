<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $bodyHtml;

    public function __construct(string $subject, string $bodyHtml)
    {
        $this->subjectText = $subject;
        $this->bodyHtml = $bodyHtml;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
                    ->view('emails.default')   // use view below
                    ->with(['bodyText' => $this->bodyHtml]);
    }
}
