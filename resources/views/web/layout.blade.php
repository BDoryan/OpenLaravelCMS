@extends('web.page')

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    @include('web.partials.header')
    <main class="py-50">
        {!! $content !!}
    </main>
    @include('web.partials.footer')

    @auth('admin')
        @include('admin.live-editor.toolbar', [
            'blocks' => \App\Models\Block::where(['active' => true])->get(),
        ])
    @endauth
@endsection
