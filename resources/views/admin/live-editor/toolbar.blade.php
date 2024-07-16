<div class="olc-fixed olc-left-4 olc-bottom-4 olc-flex olc-flex-col olc-gap-3 olc-p-4 olc-rounded-full olc-bg-gray-700 olc-bg-opacity-75 olc-border-[1px] olc-border-gray-100 olc-border-opacity-15 olc-shadow olc-text-white">
    {{-- Open modal to add block --}}
    <button data-modal-open="#blocksModal" class="olc-bg-green-700 olc-p-2 olc-rounded-full olc-border-[1px] olc-border-green-900 olc-border-opacity-30 hover:olc-olc-rotate-180 olc-transition-transform olc-duration-500 olc-transform">
        <!-- Rounded plus button with animation rotate 45deg on hover -->
        <svg class="olc-w-6 olc-h-6 olc-text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
    </button>

    {{-- Save button --}}
    <button id="saveContent" class="olc-bg-blue-700 olc-p-2 olc-rounded-full olc-border-[1px] olc-border-blue-900 olc-border-opacity-30 olc-group">
        <!-- Disk icon with animation transform y-1.5 on hover -->
        <svg class="olc-group-hover:-translate-y-1.5 olc-p-[4px] olc-transition-transform olc-duration-500 olc-transform olc-fill-gray-100 olc-w-6 olc-h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
            <g id="save">
                <path d="M22.083,24H1.917C0.86,24,0,23.14,0,22.083V1.917C0,0.86,0.86,0,1.917,0h16.914L24,5.169v16.914C24,23.14,23.14,24,22.083,24z M20,22h2V5.998l-3-3V9c0,1.103-0.897,2-2,2H7c-1.103,0-2-0.897-2-2V2H2v20h2v-7c0-1.103,0.897-2,2-2h12c1.103,0,2,0.897,2,2V22z M6,22h12v-7.001L6,15V22z M7,2v7h10V2H7z"/>
                <path d="M15,8h-4V3h4V8z"/>
            </g>
        </svg>
    </button>

    {{-- Settings button with same animation --}}
    <button class="olc-bg-gray-600 olc-p-2 olc-rounded-full olc-border-[1px] olc-border-gray-600 olc-border-opacity-30 hover:olc-olc-rotate-180 olc-transition-transform olc-duration-500 olc-transform">
        <svg class="olc-w-6 olc-h-6 olc-text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7848 0.449982C13.8239 0.449982 14.7167 1.16546 14.9122 2.15495L14.9991 2.59495C15.3408 4.32442 17.1859 5.35722 18.9016 4.7794L19.3383 4.63233C20.3199 4.30175 21.4054 4.69358 21.9249 5.56605L22.7097 6.88386C23.2293 7.75636 23.0365 8.86366 22.2504 9.52253L21.9008 9.81555C20.5267 10.9672 20.5267 13.0328 21.9008 14.1844L22.2504 14.4774C23.0365 15.1363 23.2293 16.2436 22.7097 17.1161L21.925 18.4339C21.4054 19.3064 20.3199 19.6982 19.3382 19.3676L18.9017 19.2205C17.1859 18.6426 15.3408 19.6754 14.9991 21.405L14.9122 21.845C14.7167 22.8345 13.8239 23.55 12.7848 23.55H11.2152C10.1761 23.55 9.28331 22.8345 9.08781 21.8451L9.00082 21.4048C8.65909 19.6754 6.81395 18.6426 5.09822 19.2205L4.66179 19.3675C3.68016 19.6982 2.59465 19.3063 2.07505 18.4338L1.2903 17.1161C0.770719 16.2436 0.963446 15.1363 1.74956 14.4774L2.09922 14.1844C3.47324 13.0327 3.47324 10.9672 2.09922 9.8156L1.74956 9.52254C0.963446 8.86366 0.77072 7.75638 1.2903 6.8839L2.07508 5.56608C2.59466 4.69359 3.68014 4.30176 4.66176 4.63236L5.09831 4.77939C6.81401 5.35722 8.65909 4.32449 9.00082 2.59506L9.0878 2.15487C9.28331 1.16542 10.176 0.449982 11.2152 0.449982H12.7848ZM12 15.3C13.8225 15.3 15.3 13.8225 15.3 12C15.3 10.1774 13.8225 8.69998 12 8.69998C10.1774 8.69998 8.69997 10.1774 8.69997 12C8.69997 13.8225 10.1774 15.3 12 15.3Z" class="olc-fill-gray-800"/>
        </svg>
    </button>
</div>

<div id="blocksModal" class="olc-modal olc-fixed olc-inset-0 olc-z-50 olc-hidden olc-overflow-y-auto olc-bg-black olc-bg-opacity-50">
    <div class="olc-flex olc-items-center olc-justify-center olc-min-h-screen">
        <div class="olc-bg-gray-700 olc-text-white olc-p-4 olc-rounded-lg olc-w-2/6">
            <div class="olc-flex olc-justify-between olc-items-center">
                <h2 class="olc-text-xl olc-font-bold">Ajouter un nouveau bloc à votre page</h2>
                <button data-modal-close="#blocksModal" class="olc-text-white">
                    <svg class="olc-w-6 olc-h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="olc-grid olc-grid-cols-3 olc-gap-4 olc-mt-4">
                @if($blocks->isEmpty())
                    <p class="olc-text-center">Aucun bloc disponible</p>
                @endif
                @foreach($blocks ?? [] as $block)
                    <button data-modal-close="#blocksModal" data-block-id="{{ $block->id }}" class="olc-bg-gray-800 olc-p-4 olc-rounded-lg hover:olc-bg-gray-900">
                        <p class="olc-text-center">
                            <span class="olc-text-lg olc-font-bold">{{ $block->name }}</span><br>
                            <span class="olc-italic olc-text-sm">{{ $block->view }}</span>
                        </p>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
