@if(session()->hasAlerts())
    @foreach(session()->getAlerts() as $alert)
        <x-alert type="{{ $alert['type'] }}" duration="{{ $alert['duration'] }}">
            {{ $alert['message'] }}
        </x-alert>
    @endforeach
@endif
