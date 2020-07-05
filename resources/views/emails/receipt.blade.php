@component('mail::message')
Dear {{ $firstName }},

Thank you for giving through our online giving channels.<br>

Your gift summary is shown below:

@component('mail::table')
| Date              | Type of Giving    | Giving Method     | Amount            |
| :---------------: | :---------------: | :---------------: | ----------------: |
@php
    $totalAmount = 0;
    setlocale(LC_MONETARY, "en_US");
@endphp
@foreach ($givingDetails as $details)
| {{ $timestamp }} | {{ $details[0] }} | {{ $givingMethod }} | {{ 'PHP ' . money_format('%!i', $details[1]) }} |
@php
    $totalAmount = $totalAmount + $details[1];
@endphp
@endforeach
|                   |                   | **Total Amount**  | **{{ 'PHP ' . money_format('%!i', $totalAmount) }}** |
@endcomponent

Your generous support is making a  difference as we HONOR GOD and MAKE DISCIPLES. <br>

May God richly bless you! <br>

Sincerely,<br>

**Nikki Louise Bermas** <br>
Finance Officer <br> <br>

You are receiving this email because you gave to Victory Los Baños. If you would like to update your contact information, please click [here](http://google.com).

For giving online, you may visit [victorylosbanos.org/giving](http://victorylosbanos.org/giving).
@endcomponent
