<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcknowledgeGiving extends Mailable
{
    use Queueable, SerializesModels;

    public $center;
    public $firstName;
    public $timestamp;
    public $givingMethod;
    public $givingDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->center        = $data['center'];
        $this->firstName     = $data['firstName'];
        $this->timestamp     = $data['timestamp'];
        $this->givingMethod  = $data['givingMethod'];
        $this->givingDetails = $data['givingDetails'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $center   = $this->center;
        $address  = '';
        $name     = '';
        $title    = '';

        switch ($center) {
            case 'cl':
                $address = env('MAIL_CL_USERNAME');
                $name = env('MAIL_CL_NAME');
                $title = 'Victory Calamba Acknowledgement Receipt';
                break;
            
            case 'cy':
                $address = env('MAIL_CY_USERNAME');
                $name = env('MAIL_CY_NAME');
                $title = 'Victory Cabuyao Acknowledgement Receipt';
                break;

            case 'sp':
                $address = env('MAIL_SP_USERNAME');
                $name = env('MAIL_SP_NAME'); 
                $title = 'Victory San Pablo Acknowledgement Receipt';
                break;

            case 'sc':
                $address = env('MAIL_SC_USERNAME');
                $name = env('MAIL_SC_NAME'); 
                $title = 'Victory Santa Cruz Acknowledgement Receipt';
                break;

            case 'sl':
                $address = env('MAIL_SL_USERNAME');
                $name = env('MAIL_SL_NAME'); 
                $title = 'Victory Siniloan Acknowledgement Receipt';
                break;
            
            default:
                $address = env('MAIL_LB_USERNAME');
                $name = env('MAIL_LB_NAME');
                $title = 'Victory Los Baños Acknowledgement Receipt';  
                break;
        }

        return $this->subject($title)
                    ->from($address, $name)
                    ->markdown('emails.receipt');
    }
}
