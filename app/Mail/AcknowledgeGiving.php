<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcknowledgeGiving extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;
    public $givingDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->firstName     = $data['firstName'];
        $this->givingDetails = $data['givingDetails'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Victory Los Baños Acknowledgement Receipt')
                    ->from('nikki.bermas@victory.org.ph')
                    ->markdown('emails.receipt');
    }
}
