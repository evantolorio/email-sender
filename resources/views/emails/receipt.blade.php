@component('mail::message')
Dear {{ $firstName }},

Thank you for faithfully giving to God. May God richly bless you! Here's the summary of your giving: <br>

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

Your partnership is making an impact in our campus and community as we HONOR GOD and MAKE DISCIPLES. <br>

Sincerely,<br>

**Nikki Louise Bermas** <br>
Finance Officer <br> <br>

You are receiving this email because you gave to Victory Los Baños. You may contact our [Partner Relations](mailto:partner@victorylosbanos.org?subject=Update%20Giving%20Contact%20Information) if you would like to update your contact information.

For giving online, you may visit [victorylosbanos.org/giving](http://victorylosbanos.org/giving).
@endcomponent
