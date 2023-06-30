@component('mail::message', ['center' => $center])
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

@switch($center)
@case('cl')
**{{ env('MAIL_CL_NAME') }}**
@break

@case('cy')
**{{ env('MAIL_CY_NAME') }}**
@break

@case('sp')
**{{ env('MAIL_SP_NAME') }}**
@break

@case('sc')
**{{ env('MAIL_SC_NAME') }}**
@break

@case('sl')
**{{ env('MAIL_SL_NAME') }}**
@break

@default
**{{ env('MAIL_LB_NAME') }}**
@endswitch
<br>
Finance Officer <br> <br>

@switch($center)
@case('cl')
*You are receiving this email because you gave to Victory Calamba. If you have any questions or concerns, you may contact our Finance Department at:*

***Email**: calamba@victory.org.ph*<br> 
***Phone**: 0915-597-5084*<br>
***Address**: 2nd Flr. Bldg. 3, Denson Compound, National Hi-way, Halang, Calamba City*
@break

@case('cy')
*You are receiving this email because you gave to Victory Cabuyao. If you have any questions or concerns, you may contact our Finance Department at:*

***Email**: cabuyao@victory.org.ph*<br> 
***Phone**: 0991-913-1163*<br>
***Address**: 3rd Flr Serafin Bldg. 223 Banlic, Cabuyao, Laguna*
@break

@case('sp')
*You are receiving this email because you gave to Victory San Pablo. If you have any questions or concerns, you may contact our Finance Department at:*

***Email**: sanpablo@victory.org.ph*<br> 
***Phone**: 0917-503-3738*<br>
***Address**: 3/F Lynderson Building, Lopez Jaena Street, Brgy. VII-B, San Pablo City, Laguna, 4000*
@break

@case('sc')
*You are receiving this email because you gave to Victory Santa Cruz. If you have any questions or concerns, you may contact our Finance Department at:*

***Email**: santacruz@victory.org.ph*<br> 
***Phone**: 0917-505-1123*<br>
***Address**: Primark Town Center, Sitio Mapagmahal Brgy. Pagsawitan, Santa Cruz, Laguna, 4009*
@break

@case('sl')
*You are receiving this email because you gave to Victory Siniloan. If you have any questions or concerns, you may contact our Finance Department at:*

***Email**: siniloan@victory.org.ph*<br> 
***Phone**: 0999-9343-740*<br>
***Address**: 2nd Flr. DelRos Bldg. III, G. Redor St., Brgy. Pandeño, Siniloan, Laguna*
@break

@default
You are receiving this email because you gave to Victory Los Baños. You may contact our [Partner Relations](mailto:partner@victorylosbanos.org?subject=Update%20Giving%20Contact%20Information) if you would like to update your contact information.

For giving online, you may visit [victorylosbanos.org/giving](http://victorylosbanos.org/giving).
@endswitch


@endcomponent
