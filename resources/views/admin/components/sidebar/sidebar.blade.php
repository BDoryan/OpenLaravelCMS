
<!-- Sidebar -->
<div
    class="w-64 h-screen bg-gray-800 text-white flex flex-col fixed md:relative z-10 md:z-auto transform md:transform-none transition-transform duration-200 md:duration-0 ease-in-out">
    <div class="p-4">
        <img src="{{ asset('imgs/logo-block.png') }}" alt="Logo" class="h-24 mx-auto">
    </div>
    <nav class="flex-1 flex flex-col">

{{--        <pre>{{ var_dump($content) }}</pre>--}}

        @foreach($content as $category => $links)
                <p class="text-neutral-400 text-sm px-4 pt-5 pb-2">{{ $category }}</p>
                @foreach($links as $link)
                    <x-sidebar-link-component :icon="$link->getIcon()" :label="$link->getLabel()" :route="$link->getRoute()" />
                @endforeach
        @endforeach

        <div class="mt-auto p-4">
            <p class="text-center">Bienvenue, {{ Auth::user()->name }}</p>
            <p class="text-center text-neutral-400">© 2024 OpenLaravelCMS</p>
        </div>
        <a href="{{ route('admin.settings') }}" class="w-full py-3 bg-gray-900 text-center font-bold">
            <i class="fas fa-cog w-[24px]"></i>
            Paramètres
        </a>
        <a href="{{ route('admin.logout') }}" class="w-full py-3 bg-red-700 text-center font-bold">
            <i class="fas fa-sign-out-alt w-[24px]"></i>
            Se déconnecté
        </a>
    </nav>
</div>
