<div class="my-4 alert alert-{{$type}}" data-duration="{{ $duration }}">
    <div class="bg-{{$type}}-100 border border-{{$type}}-400 text-{{$type}}-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ $slot }}</span>
        <button id="alert-close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-{{$type}}-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.95 5.05a.75.75 0 0 1 1.06 1.06L11.06 10l5.95 5.95a.75.75 0 1 1-1.06 1.06L10 11.06l-5.95 5.95a.75.75 0 0 1-1.06-1.06L8.94 10 3.99 4.05a.75.75 0 0 1 1.06-1.06L10 8.94l5.95-5.95z"></path>
            </svg>
        </button>
    </div>
</div>
