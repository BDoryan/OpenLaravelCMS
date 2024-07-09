<header class="olc-bg-gray-800 olc-text-white olc-shadow-md">
    <div class="olc-container olc-mx-auto olc-flex olc-justify-between olc-items-center olc-py-4 olc-px-6">
        <div class="olc-text-2xl olc-font-bold">
            <a href="#" class="hover:olc-text-red-300">
                <img src="{{ asset('imgs/logo-inline.png') }}" alt="Logo" class="olc-h-10">
            </a>
        </div>
        <nav class="olc-hidden md:olc-flex olc-space-x-6">
            @foreach($header_navigation as $navigation)
                <a href="{{ $navigation->page->slug }}" class="olc-block olc-px-3 olc-py-2 olc-rounded-md olc-text-base olc-font-medium olc-text-white hover:olc-bg-gray-700">{{ $navigation->page->name }}</a>
            @endforeach
        </nav>
        <div class="olc-hidden md:olc-block">
            <a href="#" class="olc-bg-white olc-text-gray-800 olc-px-4 olc-py-2 olc-rounded hover:olc-bg-gray-200">Inscription</a>
        </div>
        <div class="md:olc-hidden">
            <button id="mobile-menu-button" class="focus:olc-outline-none">
                <svg class="olc-w-6 olc-h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="olc-hidden md:olc-hidden">
        <nav class="olc-px-2 olc-pt-2 olc-pb-3 olc-space-y-1 olc-sm:px-3">
            @foreach($header_navigation as $navigation)
                <a href="/{{ $navigation->page->slug }}" class="olc-block olc-px-3 olc-py-2 olc-rounded-md olc-text-base olc-font-medium olc-text-white hover:olc-bg-gray-700">{{ $navigation->page->name }}</a>
            @endforeach
        </nav>
    </div>
</header>
