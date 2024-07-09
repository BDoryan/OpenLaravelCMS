<!-- Make 404 page -->
@extends('web.page')

@section('title', '404')

@section('content')
    <div class="olc-text-center olc-mx-auto olc-py-20 olc-container">
        <h1>404</h1>
        <p>Page not found</p>

        <a href="{{ url()->previous() ?? '/' }}" class="olc-text-blue-500">Go back</a>
    </div>
@endsection
