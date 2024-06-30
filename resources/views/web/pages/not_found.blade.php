<!-- Make 404 page -->
@extends('web.page')

@section('title', '404')

@section('content')
    <div class="text-center mx-auto py-20 container">
        <h1>404</h1>
        <p>Page not found</p>

        <a href="{{ url()->previous() ?? '/' }}" class="text-blue-500">Go back</a>
    </div>
@endsection
