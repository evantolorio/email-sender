<?php

namespace App\Http\Controllers;

use App\Mail\AcknowledgeGiving;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('send-email');
    }

    /**
     * Get the sample email.
     *
     * @return void
     */
    public function getSampleEmail()
    {
        $data = [
            'emailTo'       => 'nikki.bermas@victory.org.ph',
            'fullName'      => 'Evan Norman Tolorio',
            'firstName'     => 'Evan Norman',
            'total'         => '4000',
            'timestamp'     => 'March 26, 2020',
            'givingMethod'  => 'Direct Deposit - BPI',
            'givingDetails' => [
                [
                    'Tithes and Offering',
                    2000
                ],
                [
                    'Real LIFE',
                    1000
                ],
                [
                    'MPD',
                    1000
                ]
            ]
        ];
    
        return new AcknowledgeGiving($data);
    }
}
