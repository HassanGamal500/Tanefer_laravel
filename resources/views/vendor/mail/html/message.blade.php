@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => $appUrl])
            {{ $appName }}
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
            © {{ date('Y') }} {{ $appName }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
