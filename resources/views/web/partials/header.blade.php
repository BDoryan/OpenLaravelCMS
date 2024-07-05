<header class="bg-gray-800 text-white shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="text-2xl font-bold">
            <a href="#" class="hover:text-red-300">
                <img src="{{ asset('imgs/logo-inline.png') }}" alt="Logo" class="h-10">
            </a>
        </div>
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="hover:text-red-300">Accueil</a>
            <a href="#" class="hover:text-red-300">À propos</a>
            <a href="#" class="hover:text-red-300">Services</a>
            <a href="#" class="hover:text-red-300">Contact</a>
        </nav>
        <div class="hidden md:block">
            <a href="#" class="bg-white text-gray-800 px-4 py-2 rounded hover:bg-gray-200">Inscription</a>
        </div>
        <div class="md:hidden">
            <button id="mobile-menu-button" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden">
        <nav class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Accueil</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">À propos</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Services</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Contact</a>
            <a href="#" class="block px-3 py-2 mt-2 rounded-md text-base font-medium bg-white text-red-800 hover:bg-gray-200">Inscription</a>
        </nav>
    </div>
</header>
