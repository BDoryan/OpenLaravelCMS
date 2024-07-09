<div class="olc-toast-container max-w-[400px] bottom-5 right-5">
    @if(Session::hasToasts())
        @foreach(Session::getToasts() as $toast)
            <x-toast type="{{ $toast['type'] }}" :duration="$toast['duration']">
                <x-slot name="title">{{ $toast['title'] }}</x-slot>
                <x-slot name="message">{{ $toast['message'] }}</x-slot>
            </x-toast>
        @endforeach
    @endif
</div>
