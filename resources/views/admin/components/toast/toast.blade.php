<div data-duration="{{$duration}}" class="olc-toast olc-toast-{{$type}} olc-p-4 olc-rounded olc-shadow-lg olc-flex olc-items-start olc-space-x-2">
    <div class="olc-flex-shrink-0">
        @if($type === 'danger')
            <svg class="olc-h-6 olc-w-6 olc-text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
            </svg>
        @endif

        @if($type === 'success')
            <svg class="olc-h-6 olc-w-6 olc-text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        @endif

        @if($type === 'info')
            <svg class="olc-h-7 olc-w-6 olc-text-blue-600 olc-stroke-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke-width="1.5"/>
                <path d="M12 17V11" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="1" cy="1" r="1" class="olc-fill-blue-600" transform="matrix(1 0 0 -1 11 9)" />
            </svg>
        @endif

        @if($type === 'warning')
            <svg class="olc-h-7 olc-w-6 olc-text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.29 3.86l-7.19 12A1 1 0 004 17h16a1 1 0 00.86-1.5l-7.19-12a1 1 0 00-1.72 0zM12 9v4m0 4h.01"/>
            </svg>
        @endif
    </div>
    <div class="olc-w-full">
        <p class="olc-font-bold olc-relative olc-mb-2 olc-text-lg olc-leading-[1.4em]">
            {{$title}}

            <button type="button" data-toast-action="close" class="hover:olc-olc-bg-transparent olc-text-gray-800 hover:olc-olc-bg-gray-100 olc-absolute olc-right-[-10px] olc-mt-[-10px] olc-top-1/2 olc--translate-y-1/2 olc-cursor-pointer">
                <svg class="olc-h-5 olc-w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </p>
        <p class="olc-text-sm">
            {{$message}}
        </p>
    </div>
</div>
