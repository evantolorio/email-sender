<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AcknowledgeGiving;
use Google_Spreadsheet;
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
            'emailTo' => 'nikki.bermas@victory.org.ph',
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

        Mail::to($data['emailTo'])->send(new AcknowledgeGiving($data));

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
        $client = Google_Spreadsheet::getClient(storage_path().'/app/service-account-key.json');
        // Get the sheet instance by sheets_id and sheet name
        $sheet = $client->file('1YpC178lUWxUZRsQnherOwBKodrTOMpn1LPXD1FDt58I')->sheet('to email');
        // Fetch data without cache
        $items = $sheet->fetch(true)->items;

        if (empty($items)) return json_encode([]);

        $givingData = [];
        // Build data
        foreach ($items as $key => $item) {

            // if ($item['Sent'] != '') {
            //     continue;
            // }

            $processedData = [
                'emailTo'       => $item['Email'],
                'fullName'      => $item['Name'],
                'firstName'     => $item['First Name'],
                'givingDetails' => []
            ];

            $keys = array_keys($item);

            $beginTrackingDetails = false;
            // Ignore last column which is 'Total'
            for ($i = 0; $i < count($keys) - 1; $i++) {

                // Track if ready to track giving details
                if ($keys[$i] == 'Giving Method') {
                    $beginTrackingDetails = true;
                    continue;
                }

                // Ignore empty column headers
                if (trim($keys[$i]) == '') {
                    continue;
                }

                if ($beginTrackingDetails) {
                    $processedData['givingDetails'][] = [
                        $item['Timestamp'],
                        $keys[$i],
                        $item['Giving Method'],
                        number_format(preg_replace('/[^0-9.]/', '', $item[$keys[$i]]), 2)
                    ];
                }
            }

            $givingData[] = $processedData;

        }
        

        return json_encode($givingData);

    }

}
