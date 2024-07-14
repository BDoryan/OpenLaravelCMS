<!-- Sidebar -->
<div
    class="olc-w-64 olc-h-screen olc-bg-gray-800 olc-text-white olc-flex olc-flex-col olc-fixed md:olc-relative olc-z-10 md:olc-z-auto olc-transform md:olc-transform-none olc-transition-transform olc-duration-200 md:olc-duration-0 olc-ease-in-out">
    <div class="olc-p-4">
        <img src="{{ asset('imgs/logo-block.png') }}" alt="Logo" class="olc-h-24 olc-mx-auto">
    </div>
    <nav class="olc-flex-1 olc-flex olc-flex-col">
        @foreach($content as $category => $links)
            <p class="olc-text-neutral-400 olc-text-sm olc-px-4 olc-pt-5 olc-pb-2">{{ $category }}</p>
            @foreach($links as $link)
                <x-sidebar-link :icon="$link->getIcon()" :label="$link->getLabel()" :route="$link->getRoute()" />
            @endforeach
        @endforeach

        <div class="olc-mt-auto olc-p-4">
            <p class="olc-text-center">{{ __('admin.sidebar.welcome', ['name' => Auth::user()->name]) }}</p>
            <p class="olc-text-center olc-text-neutral-400">© 2024 OpenLaravelCMS</p>
        </div>
        <a href="{{ route('admin.settings') }}" class="olc-w-full olc-py-3 olc-bg-gray-900 olc-text-center olc-font-bold">
            <i class="fas fa-cog olc-w-[24px]"></i>
            {{ __('admin.sidebar.settings') }}
        </a>
        <a href="{{ route('admin.logout') }}" class="olc-w-full olc-py-3 olc-bg-red-700 olc-text-center olc-font-bold">
            <i class="fas fa-sign-out-alt olc-w-[24px]"></i>
            {{ __('admin.sidebar.logout') }}
        </a>
    </nav>
</div>
