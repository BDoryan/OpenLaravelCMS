@extends('admin.page')

@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar  />
        <!-- Main content -->
        <div class="flex-1 p-10 ml-64 md:ml-0 bg-gray-700">
            @yield('section-wrapper')
        </div>
    </div>
    <x-show-toasts />
@endsection
