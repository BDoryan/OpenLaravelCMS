<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- You can replace this with your own CSS file -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @routes

    @vite('resources/css/app.css')
    @vite('resources/js/cms.js')

    @auth('admin')
        <!-- jQuery UI required for sortable in live-edit.js -->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
                integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>

        <!-- TinyMCE WYSIWYG editor -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js"
                integrity="sha512-zmlLhIesl+uwwzjoUz/izUsSjAMVb/7fH2ffCbJvYLepAvdvAq1T6ev9edZR8jwRKfM0OTaUyFVO1D7wAwXCEw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/icons/default/icons.min.js"
                integrity="sha512-H0IUmv3xbTHfDHp5Fm3VzTLteKubnkpQWb+7Us6Hv681yLrnxfA3OGDT+49VY/hsRA32FYDiVHkb/0n57B6Dqw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/models/dom/model.min.js"
                integrity="sha512-ug/hHid+Tu1LCNdINw4xcHhvlk12hEJlagm6hrSM0ejX7jd6D9vHjGEiO6BCPqf44Z7G+vtV9l9WaL86fdHwzw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @vite('resources/js/live-edit.js')
    @endauth

    <title>@yield('title')</title>

    @livewireStyles
</head>
<body @auth('admin') data-page-id="{{ $page->id ?? 'undefined' }}" @endauth>
<div class="olc-flex olc-flex-col olc-min-h-screen" id="cms-wrapper">
    @yield('content')
</div>
<x-show-toasts/>
@livewireScripts
</body>
</html>
