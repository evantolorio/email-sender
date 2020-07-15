<tr>
    <td class="header">
        <table class="inner-header" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td>
                    <a href="{{ $url }}" style="display: inline-block;">
                    @if (trim($slot) === 'Laravel')
                    <img src="{{ asset('email_header_light.png') }}" class="banner" alt="Giving Banner">
                    @else
                    {{ $slot }}
                    @endif
                    </a>
                    <span>
                    GIVING ACKNOWLEDGEMENT RECEIPT
                    </span>
                </td>
            </tr>
        </table>
    </td>
</tr>
