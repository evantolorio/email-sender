<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AcknowledgeGiving;
use Carbon\Carbon;
use Google_Spreadsheet;
use Mail;

class ReceiptController extends Controller
{

    /**
     * Get data from Google Sheet then send 
     * giving acknowledgement emails
     *
     * @param Request $request
     * @return array
     */
    public function sendEmails(Request $request)
    {
        $googleSheetId = $request->googleSheetId;

        $client = Google_Spreadsheet::getClient(storage_path().'/app/service-account-key.json');
        // Get the sheet instance by sheets_id and sheet name
        $sheet = $client->file($googleSheetId)->sheet('to email');
        // Fetch data without cache
        $items = $sheet->fetch(true)->items;

        if (empty($items)) return json_encode([]);

        $givingData = [];

        // Build data
        foreach ($items as $key => $item) {

            if ($item['Date Acknowledged'] != '') {
                continue;
            }

            $processedData = [
                'emailTo'       => $item['Email'],
                'fullName'      => $item['Name'],
                'firstName'     => $item['First Name'],
                'total'         => $item['Total'],
                'timestamp'     => Carbon::createFromFormat('m/d/Y G:i:s', $item['Timestamp'])->format('M j, Y'),
                'givingMethod'  => $item['Giving Method'],
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
                    if (empty($item[$keys[$i]])) continue;

                    // Given To, Amount
                    $processedData['givingDetails'][] = [
                        $keys[$i],
                        number_format(
                            (float)preg_replace('/[^0-9.]/', '', $item[$keys[$i]]), 
                            2
                        )
                    ];
                }
            }

            $givingData[] = $processedData;
            $dateAcknowledged = Carbon::now();

            $givingData[count($givingData)-1]['dateAcknowledged'] = $dateAcknowledged->format('M j, Y');

            // Send email
            Mail::to($processedData['emailTo'])->send(
                new AcknowledgeGiving($processedData)
            );

            // Update Google sheet
            $sheet->update(['Date Acknowledged' => $dateAcknowledged->format('m/d/Y G:i:s')], $item);

        }

        return json_encode($givingData);
    }

    /**
     * Get giving data from Google Sheet
     *
     * @param Request $request
     * @return JSON
     */
    public function getData(Request $request)
    {
        $googleSheetId = $request->googleSheetId;

        $client = Google_Spreadsheet::getClient(storage_path().'/app/service-account-key.json');
        // Get the sheet instance by sheets_id and sheet name
        $sheet = $client->file($googleSheetId)->sheet('to email');
        // Fetch data without cache
        $items = $sheet->fetch(true)->items;

        if (empty($items)) return json_encode([]);

        $givingData = [];

        // Build data
        foreach ($items as $key => $item) {

            if ($item['Date Acknowledged'] != '') {
                continue;
            }

            $processedData = [
                'emailTo'       => $item['Email'],
                'fullName'      => $item['Name'],
                'firstName'     => $item['First Name'],
                'total'         => $item['Total'],
                'timestamp'     => Carbon::createFromFormat('m/d/Y G:i:s', $item['Timestamp'])->format('M j, Y'),
                'givingMethod'  => $item['Giving Method'],
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
                    if (empty($item[$keys[$i]])) continue;

                    // Type of Giving, Amount
                    $processedData['givingDetails'][] = [
                        $keys[$i],
                        number_format(
                            (float)preg_replace('/[^0-9.]/', '', $item[$keys[$i]]), 
                            2
                        )
                    ];
                }
            }

            $givingData[] = $processedData;

        }

        return json_encode($givingData);

    }

}
