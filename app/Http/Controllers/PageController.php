<?php

namespace App\Http\Controllers;

use Auth;
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
     * Get HTML template of given giving data
     *
     * @param  Request $request
     * @return AcknowledgeGiving
     */
    public function getHtmlTemplate(Request $request)
    {
        $givingDetails = json_decode($request->givingDetails);

        // Transform string format to float
        for ($i = 0; $i < count($givingDetails); $i++) {
            $givingDetails[$i][1] = (float)preg_replace('/[^0-9.]/', '', $givingDetails[$i][1]);
        }

        $data = [
            'center'        => Auth::user()->center,
            'emailTo'       => $request->emailTo,
            'fullName'      => $request->fullName,
            'firstName'     => $request->firstName,
            'total'         => $request->total,
            'timestamp'     => $request->timestamp,
            'givingMethod'  => $request->givingMethod,
            'givingDetails' => $givingDetails
        ];

        return new AcknowledgeGiving($data);
    }

    /**
     * Get the sample email.
     *
     * @return AcknowledgeGiving
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
