<div class="flex gap-5">
    <div class="flex flex-col">
        <h2 class="text-2xl pt-0 font-semibold text-dark dark:text-white">
            {{ $title }}
        </h2>
        <p class="text-base text-body-color dark:text-neutral-400">
            {{ $description }}
        </p>
    </div>
    <div class="ms-auto flex items-center gap-5">
        {{ $actions  ?? ''}}
    </div>
</div>
