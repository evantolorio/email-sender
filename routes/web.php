<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('send-email');
});

Route::get('/sample-mail', function () {

    $data = [
        'email' => 'evantolorio@gmail.com',
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

    return new App\Mail\AcknowledgeGiving($data);
});
