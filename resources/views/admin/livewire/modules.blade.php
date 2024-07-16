<div class="olc-mt-10 olc-flex olc-flex-col olc-gap-6">
    <div class="olc-flex olc-justify-between olc-items-center">
        <div class="olc-w-1/2">
            <input wire:model.live="search" type="text"
                   class="olc-w-full olc-rounded-lg olc-border-gray-300 olc-shadow-sm olc-p-2"
                   placeholder="{{__('admin.modules.search_a_module')}}">
        </div>
        <div>
            <button
                class="olc-bg-blue-600 olc-text-white olc-py-2 olc-px-4 olc-rounded-lg olc-shadow-sm hover:olc-bg-blue-700">
                <i class="fas fa-plus"></i>
                Installer un module
            </button>
        </div>
    </div>

    <div class="olc-flex olc-flex-wrap -olc-mx-4">
        @if(empty($modules))
            <div class="olc-w-full md:olc-w-1/2 lg:olc-w-1/3 olc-px-4 olc-mb-8">
                <p class="olc-text-white">Aucun module installé.</p>
            </div>
        @else
            @foreach ($modules as $module)
                <div class="olc-w-full md:olc-w-1/2 lg:olc-w-1/3 olc-px-4 olc-mb-8">
                    <div
                        class="olc-bg-slate-800 olc-shadow-lg olc-rounded-lg olc-p-6 transition-transform transform hover:scale-105">
                        <h3 class="olc-text-3xl olc-uppercase olc-font-semibold olc-text-gray-200 olc-mb-2">{{ $module['name'] }}</h3>
                        <p class="olc-text-slate-200 olc-mb-4">{{ $module['description'] }}</p>
                        <div class="olc-flex olc-flex-col">
                            <span class="olc-text-sm olc-text-gray-400">Version: {{ $module['version'] }}</span>
                            <span class="olc-text-sm olc-text-gray-400">Auteur: {{ $module['author'] }}</span>
                        </div>
                        <div class="olc-mt-4 olc-flex olc-justify-between">
                            <a href="{{ $module['route'] }}"
                               class="olc-bg-blue-600 olc-text-white olc-rounded-lg olc-py-2 olc-px-4 olc-transition hover:olc-bg-blue-700">Voir
                                les détails</a>
                            <div class="olc-flex olc-space-x-2">
                                <a href="#"
                                   class="olc-bg-red-500 olc-text-white olc-rounded-lg olc-py-2 olc-px-4 olc-transition hover:olc-bg-red-600">Désactiver</a>
                                <a href="#" class="olc-bg-red-700 olc-text-white olc-rounded-lg olc-py-2 olc-px-4
                            olc-transition hover:olc-bg-red-800">Désinstaller</a>
                            </div>
                        </div>
                        <div class="olc-flex olc-mt-4 olc-space-x-2">
                            {{--                        <a href="#" class="olc-bg-green-500 olc-text-white olc-rounded-lg olc-py-2 olc-px-4 olc-transition hover:olc-bg-green-600">Activer</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
