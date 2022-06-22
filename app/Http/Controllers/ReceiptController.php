<?php

namespace App\Http\Controllers;

use App\Mail\AcknowledgeGiving;
use Carbon\Carbon;
use Google_Spreadsheet;
use Illuminate\Http\Request;
use Mail;
use Swift_SmtpTransport as SmtpTransport;
use Swift_Mailer;

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
        $center        = $request->center;
        $googleSheetId = $request->googleSheetId;

        // Set appropriate mailer configuration for respective center
        $this->setMailer($center);

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
                'center'        => $center,
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
                        (float)preg_replace('/[^0-9.]/', '', $item[$keys[$i]])
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

    /**
     * Set Mailer with appropriate configuration based from center
     *
     * @param String $center
     * @return void
     */
    private function setMailer($center) {
        // Create the Transport according to contextualized center
        $username = '';
        $password = '';

        switch ($center) {
            case 'cl':
                $username = env('MAIL_CL_USERNAME');
                $password = env('MAIL_CL_PASSWORD');
                break;

            case 'cy':
                $username = env('MAIL_CY_USERNAME');
                $password = env('MAIL_CY_PASSWORD');
                break;

            case 'sp':
                $username = env('MAIL_SP_USERNAME');
                $password = env('MAIL_SP_PASSWORD'); 
                break;

            case 'sc':
                $username = env('MAIL_SC_USERNAME');
                $password = env('MAIL_SC_PASSWORD'); 
                break;

            case 'sl':
                $username = env('MAIL_SL_USERNAME');
                $password = env('MAIL_SL_PASSWORD'); 
                break;
            
            default:
                $username = env('MAIL_LB_USERNAME');
                $password = env('MAIL_LB_PASSWORD');  
                break;
        }

        $transport = (new SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT')))
            ->setUsername($username)
            ->setPassword($password);

        if (!empty(env('MAIL_ENCRYPTION'))) {
            $transport->setEncryption(env('MAIL_ENCRYPTION'));
        }

        // Create the Mailer using created Transport
        $mailer = new Swift_Mailer($transport);

        Mail::setSwiftMailer($mailer);
    }

}
