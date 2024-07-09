<div>
    <div class="olc-mb-6">
        <input wire:model="email" type="text" placeholder="Votre adresse email" class="olc-w-full olc-px-5 olc-py-3 olc-text-base olc-bg-transparent olc-border olc-rounded-md olc-outline-none olc-border-stroke olc-text-body-color olc-text-black olc-border-gray-600 focus:olc-border-primary olc-focus-visible:shadow-none olc-placeholder-gray-600" />
        @error('email') <span class="olc-text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="olc-mb-6">
        <input wire:model="password" type="password" placeholder="Mot de passe" class="olc-w-full olc-px-5 olc-py-3 olc-text-base olc-bg-transparent olc-border olc-rounded-md olc-outline-none olc-border-stroke olc-text-body-color olc-text-black olc-border-gray-600 focus:olc-border-primary olc-focus-visible:shadow-none olc-placeholder-gray-600" />
        @error('password') <span class="olc-text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="olc-flex olc-items-center olc-justify-between olc-mb-6">
        <label class="olc-flex olc-items-center olc-space-x-3">
            <input wire:model="remember" type="checkbox" class="olc-w-4 olc-h-4 olc-border olc-border-stroke olc-rounded-md olc-cursor-pointer olc-border-primary focus:olc-border-primary olc-focus-visible:shadow-none" />
            <span class="olc-text-sm olc-text-gray-500">Se souvenir de moi</span>
        </label>
    </div>
    <div class="olc-mb-10">
        <button wire:click="login" wire:loading.attr="disabled" class="olc-w-full olc-px-5 olc-py-3 olc-text-bas olc-bg-green-800 olc-font-medium olc-text-white olc-transition olc-border olc-rounded-md olc-cursor-pointer olc-border-primary olc-bg-primary hover:olc-bg-opacity-90">
            <span wire:loading wire:target="login">Chargement...</span>
            <span wire:loading.remove>Connexion</span>
        </button>
    </div>
    <div wire:loading.remove>
        @if($error)
            <div class="olc-text-red-500">{{ $error }}</div>
        @endif
    </div>
</div>
