<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTP_sender extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mtitle,$mShortMsg,$code)
    {
        $this->code = $code;
        $this->mtitle = $mtitle;
        $this->mShortMsg = $mShortMsg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.OTP_sender')->with([
            'mtitle'=> $this->mtitle,
            'code' => $this->code,
            'mShortMsg' => $this->mShortMsg
        ]);
    }
}
