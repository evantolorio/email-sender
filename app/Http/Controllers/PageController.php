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
            'emailTo' => 'evantolorio@gmail.com',
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
    
        return new AcknowledgeGiving($data);
    }
}
