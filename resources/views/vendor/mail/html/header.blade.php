<tr>
    <td class="header">
        <table class="inner-header" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td>
                    <a href="#!" style="display: inline-block; cursor: default;">
                    @if (trim($slot) === 'Laravel')
                    @switch($center)
                    @case('cl')
                    <img src="{{ asset('calamba/cal_header.png') }}" class="banner" alt="Giving Banner">
                    @break

                    @case('cy')
                    <img src="{{ asset('cabuyao/cy_header.png') }}" class="banner" alt="Giving Banner">
                    @break

                    @case('sp')
                    <img src="{{ asset('sanpablo/sp_header.png') }}" class="banner" alt="Giving Banner">
                    @break

                    @case('sc')
                    <img src="{{ asset('santacruz/sc_header.png') }}" class="banner" alt="Giving Banner">
                    @break

                    @default
                    <img src="{{ asset('losbanos/lb_header.png') }}" class="banner" alt="Giving Banner">
                    @endswitch
                    
                    @else
                    {{ $slot }}
                    @endif
                    </a>
                    {{-- Header Giving Acknowledgement Receipt --}}
                    @switch($center)
                    @case('cl')
                    <span id="calamba">
                    GIVING ACKNOWLEDGEMENT RECEIPT  
                    </span>
                    @break

                    @case('cy')
                    <span id="cabuyao">
                    GIVING ACKNOWLEDGEMENT RECEIPT  
                    </span>
                    @break

                    @case('sp')
                    <span id="sanpablo">
                    GIVING ACKNOWLEDGEMENT RECEIPT  
                    </span>
                    @break

                    @case('sc')
                    <span id="santacruz">
                    GIVING ACKNOWLEDGEMENT RECEIPT  
                    </span>
                    @break

                    @default
                    <span>
                    GIVING ACKNOWLEDGEMENT RECEIPT  
                    </span>
                    @endswitch
                </td>
            </tr>
        </table>
    </td>
</tr>
