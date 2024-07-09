<div data-duration="{{$duration}}" class="toast toast-{{$type}} p-4 rounded shadow-lg flex items-start space-x-2">
    <div class="flex-shrink-0">
        @if($type === 'danger')
            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
            </svg>
        @endif

        @if($type === 'success')
            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        @endif

        @if($type === 'info')
            <svg class="h-7 w-6 text-blue-600 stroke-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke-width="1.5"/>
                <path d="M12 17V11" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="1" cy="1" r="1" class="fill-blue-600" transform="matrix(1 0 0 -1 11 9)" />
            </svg>
        @endif

        @if($type === 'warning')
            <svg class="h-7 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.29 3.86l-7.19 12A1 1 0 004 17h16a1 1 0 00.86-1.5l-7.19-12a1 1 0 00-1.72 0zM12 9v4m0 4h.01"/>
            </svg>
        @endif
    </div>
    <div class="w-full">
        <p class="font-bold relative mb-2 text-lg leading-[1.4em]">
            {{$title}}

            <button type="button" data-toast-action="close" class="hover:bg-transparent text-gray-800 hover:bg-gray-100 absolute right-[-10px] mt-[-10px] top-1/2 -translate-y-1/2 cursor-pointer">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </p>
        <p class="text-sm">
            {{$message}}
        </p>
    </div>
</div>
