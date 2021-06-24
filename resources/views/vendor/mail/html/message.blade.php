@component('mail::layout', ['center' => $center])
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url'), 'center' => $center])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Victory Laguna. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
