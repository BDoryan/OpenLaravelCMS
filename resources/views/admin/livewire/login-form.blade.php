<div>
    <div class="mb-6">
        <input wire:model="email" type="text" placeholder="Votre adresse email" class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color text-black border-gray-600 focus:border-primary focus-visible:shadow-none placeholder-gray-600" />
        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="mb-6">
        <input wire:model="password" type="password" placeholder="Mot de passe" class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color text-black border-gray-600 focus:border-primary focus-visible:shadow-none placeholder-gray-600" />
        @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="flex items-center justify-between mb-6">
        <label class="flex items-center space-x-3">
            <input wire:model="remember" type="checkbox" class="w-4 h-4 border border-stroke rounded-md cursor-pointer border-primary focus:border-primary focus-visible:shadow-none" />
            <span class="text-sm text-gray-500">Se souvenir de moi</span>
        </label>
    </div>
    <div class="mb-10">
        <button wire:click="login" wire:loading.attr="disabled" class="w-full px-5 py-3 text-bas bg-green-800 font-medium text-white transition border rounded-md cursor-pointer border-primary bg-primary hover:bg-opacity-90">
            <span wire:loading wire:target="login">Chargement...</span>
            <span wire:loading.remove>Connexion</span>
        </button>
    </div>
    <div wire:loading.remove>
        @if($error)
            <div class="text-red-500">{{ $error }}</div>
        @endif
    </div>
</div>
