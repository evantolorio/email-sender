<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AcknowledgeGiving;
use Mail;

class ReceiptController extends Controller
{
    /**
     * Send email through specified GMail account
     *
     * @param Request $request
     * @return string
     */
    public function sendEmail(Request $request)
    {
        $data = [
            'email' => 'nikki.bermas@victory.org.ph',
            'firstName' => 'Evan Norman',
            'givingDetails' => [
                [
                    'March 26, 2020',
                    'Tithes and Offering',
                    'Direct Deposit',
                    2000
                ],
                [
                    'March 26, 2020',
                    'Real LIFE',
                    'GCash',
                    1000
                ],
                [
                    'March 26, 2020',
                    'MPD',
                    'GCash',
                    1000
                ]
            ]
        ];

        Mail::to($data['email'])->send(new AcknowledgeGiving($data));

        return "Email sent";
    }

    /**
     * Get giving data from Google Sheet
     *
     * @param Request $request
     * @return JSON
     */
    public function getData(Request $request)
    {
        return "Get Data";
    }

}
