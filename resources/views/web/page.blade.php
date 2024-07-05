<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/app.css')
    @vite('resources/js/cms.js')

    @routes

    @auth('admin')
        @vite('resources/js/live-edit.js')
    @endauth

    <title>@yield('title')</title>

    @livewireStyles
</head>
<body @auth('admin') data-page-id="{{ $page->id }}" @endauth>
<div class="flex flex-col min-h-screen" id="cms-wrapper">
    @yield('content')
</div>
@livewireScripts
</body>
</html>
