@component('mail::message')
Dear {{ $firstName }},

Thank you for faithfully giving to God. May God richly bless you! Here's the summary of your giving: <br>

@component('mail::table')
| Date              | Type of Giving    | Giving Method     | Amount            |
| :---------------: | :---------------: | :---------------: | ----------------: |
@php
    $totalAmount = 0;
@endphp
@foreach ($givingDetails as $details)
| {{ $timestamp }} | {{ $details[0] }} | {{ $givingMethod }} | {{ 'PHP ' . number_format($details[1], 2, '.', ',') }} |
@php
    $totalAmount = $totalAmount + $details[1];
@endphp
@endforeach
|                   |                   | **Total Amount**  | **{{ 'PHP ' . number_format($totalAmount, 2, '.', ',') }}** |
@endcomponent

Your partnership is making an impact in our campus and community as we HONOR GOD and MAKE DISCIPLES. <br>

Sincerely,<br>

@switch(Auth::user()->center)
@case('cl')
**{{ env('MAIL_CL_NAME') }}**
@break

@case('sp')
**{{ env('MAIL_SP_NAME') }}**
@break

@case('sc')
**{{ env('MAIL_SC_NAME') }}**
@break

@default
**{{ env('MAIL_LB_NAME') }}**
@endswitch
<br>
Finance Officer <br> <br>

@switch(Auth::user()->center)
@case('cl')
You are receiving this email because you gave to Victory Calamba.
@break

@case('sp')
You are receiving this email because you gave to Victory San Pablo.
@break

@case('sc')
You are receiving this email because you gave to Victory Santa Cruz.
@break

@default
You are receiving this email because you gave to Victory Los Baños. You may contact our [Partner Relations](mailto:partner@victorylosbanos.org?subject=Update%20Giving%20Contact%20Information) if you would like to update your contact information.

For giving online, you may visit [victorylosbanos.org/giving](http://victorylosbanos.org/giving).
@endswitch


@endcomponent
