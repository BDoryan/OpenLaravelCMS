<div class="olc-my-4 olc-alert olc-alert-{{$type}}" data-duration="{{ $duration }}">
    <div class="olc-bg-{{$type}}-100 olc-border olc-border-{{$type}}-400 olc-text-{{$type}}-700 olc-px-4 olc-py-3 olc-rounded olc-relative" role="alert">
        <span class="olc-block olc-sm:olc-inline">{{ $slot }}</span>
        <button id="alert-close-button" class="olc-absolute olc-top-0 olc-bottom-0 olc-right-0 olc-px-4 olc-py-3">
            <svg class="olc-fill-current olc-h-6 olc-w-6 olc-text-{{$type}}-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.95 5.05a.75.75 0 0 1 1.06 1.06L11.06 10l5.95 5.95a.75.75 0 1 1-1.06 1.06L10 11.06l-5.95 5.95a.75.75 0 0 1-1.06-1.06L8.94 10 3.99 4.05a.75.75 0 0 1 1.06-1.06L10 8.94l5.95-5.95z"></path>
            </svg>
        </button>
    </div>
</div>
