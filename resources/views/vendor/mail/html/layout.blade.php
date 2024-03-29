<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
    <td align="center">
        @switch($center)
        @case('cl')
        <img src="{{ asset('calamba/cal_logo_blue.png') }}" class="vlb-logo" alt="Logo">
        @break

        @case('cy')
        <img src="{{ asset('cabuyao/cy_logo_black.png') }}" class="vlb-logo" alt="Logo">
        @break

        @case('sp')
        <img src="{{ asset('sanpablo/sp_logo_blue.png') }}" class="vlb-logo" alt="Logo">
        @break

        @case('sc')
        <img src="{{ asset('santacruz/sc_logo_black.png') }}" class="vlb-logo" alt="Logo">
        @break

        @case('sl')
        <img src="{{ asset('siniloan/sl_logo_blue.png') }}" class="vlb-logo" alt="Logo">
        @break

        @default
        <img src="{{ asset('losbanos/lb_logo_blue.png') }}" class="vlb-logo" alt="Logo">
        @endswitch
    </td>
</tr>
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
