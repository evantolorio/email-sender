@component('mail::message')
Dear Evan Norman,

Thank you for giving through our online giving channels.<br>

Your gift summary is shown below:

@component('mail::table')
| Date              | Type of Giving    | Giving Method     | Amount            |
| :---------------: | :---------------: | :---------------: | ----------------: |
@php
    $totalAmount = 0;
    setlocale(LC_MONETARY,"en_US");
@endphp
@foreach ($givingDetails as $details)
| {{ $details[0] }} | {{ $details[1] }} | {{ $details[2] }} | {{ 'PHP ' . money_format('%!i', $details[3]) }} |
@php
    $totalAmount = $totalAmount + $details[3];
@endphp
@endforeach
|                   |                   | **Total Amount**  | **{{ 'PHP ' . money_format('%!i', $totalAmount) }}** |
@endcomponent

Your generous support is making a  difference as we HONOR GOD and MAKE DISCIPLES. <br>

May God richly bless you! <br>

Sincerely,<br>

**Nikki Louise Bermas** <br>
Finance Officer <br> <br>

You are receiving this email because you gave to the missions efforts of Victory Los Baños. If you would like to receive an official receipt, kindly contact us through this email within 30 days upon receiving this acknowledgement receipt. If you would like to update your contact information, please click here.

For giving online, you may visit [victorylosbanos.org/giving.](http://victorylosbanos.org/giving)
@endcomponent
