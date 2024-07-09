<div class="olc-flex olc-gap-5">
    <div class="olc-flex olc-flex-col">
        <h2 class="olc-text-2xl olc-pt-0 olc-font-semibold olc-text-dark dark:olc-text-white">
            {{ $title }}
        </h2>
        <p class="olc-text-base olc-text-body-color dark:olc-text-neutral-400">
            {{ $description }}
        </p>
    </div>
    <div class="olc-ms-auto olc-flex olc-items-center olc-gap-5">
        {{ $actions  ?? ''}}
    </div>
</div>
