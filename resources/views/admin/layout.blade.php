@extends('admin.page')

@section('content')
    <div class="olc-flex">
        <!-- Sidebar -->
        <x-sidebar />
        <!-- Main content -->
        <div class="olc-flex-1 olc-p-10 olc-ml-64 md:olc-ml-0 olc-bg-gray-700">
            @yield('section-wrapper')
        </div>
    </div>
    <x-show-toasts />
@endsection
