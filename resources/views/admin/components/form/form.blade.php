<div class="olc-pb-10">
    <a href="{{ route('admin.crud', ['model' => $model_name]) }}"
       class="olc-text-blue-500 hover:olc-text-blue-700 dark:olc-text-blue-300 dark:hover:olc-text-blue-500">< Retour à la liste</a>
</div>

<form class="olc-space-y-6 olc-bg-gray-800 olc-p-6 olc-rounded-lg olc-shadow-md olc-w-1/2 olc-mx-auto" action="" method="POST">
    @csrf

    @if(!empty($entity->id))
        <input class="olc-bg-red-700" type="hidden" name="id" value="{{ $entity->id }}"/>
    @endif

    <x-show-alerts />

    @foreach($fields as $field)
        <div class="olc-flex olc-flex-col">
            @if($field['type'] === 'checkbox')
                <label class="olc-inline-flex olc-items-center olc-cursor-pointer">
                    <input {{ $field['required'] ? 'required' : '' }} type="{{ $field['type'] }}"
                           id="{{ $field['name'] }}" name="{{ $field['name'] }}" value="1" {{ $field['value'] ? 'checked' : '' }} class="olc-sr-only olc-peer">
                    <div class="olc-relative olc-w-11 olc-h-6 olc-bg-gray-200 peer-focus:olc-outline-none peer-focus:olc-ring-4 peer-focus:olc-ring-blue-300 dark:peer-focus:olc-ring-blue-800 olc-rounded-full olc-peer dark:olc-bg-gray-700 peer-checked:after:olc-translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:olc-border-white after:olc-content-[''] after:olc-absolute after:olc-top-[2px] after:olc-start-[2px] after:olc-bg-white after:olc-border-gray-300 after:olc-border after:olc-rounded-full after:olc-h-5 after:olc-w-5 after:olc-transition-all dark:olc-border-gray-600 peer-checked:olc-bg-blue-600"></div>
                    <label class="olc-ms-3 olc-text-sm olc-font-medium olc-text-gray-900 dark:olc-text-gray-300" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                </label>
            @else
                <label for="{{ $field['name'] }}"
                       class="olc-mb-2 olc-text-lg olc-font-medium olc-text-gray-300">{{ $field['label'] }}</label>
                <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                       value="{{ $field['value'] }}"
                       class="olc-px-4 olc-py-2 olc-bg-gray-900 olc-text-gray-300 olc-border olc-border-gray-700 olc-rounded-lg focus:olc-outline-none focus:olc-ring-2 focus:olc-ring-blue-500 focus:olc-border-blue-500">
            @endif
            @error($field['name'])
            <p class="olc-text-red-500 olc-text-sm olc-mt-1">{{ $message }}</p>
            @enderror
        </div>
    @endforeach
    @if(!empty($entity->id))
        <input class="olc-bg-red-700" type="hidden" name="id" value="{{ $entity->id }}"/>
    @endif

    <div class="olc-flex olc-justify-between">
        <a href="{{ route('admin.crud', ['model' => $model_name]) }}"
           class="olc-px-4 olc-py-2 olc-bg-gray-600 olc-text-white olc-font-semibold olc-rounded-lg olc-shadow-md hover:olc-bg-gray-700 focus:olc-outline-none focus:olc-ring-2 focus:olc-ring-gray-500 focus:olc-ring-opacity-75">
            Annuler et retour
        </a>
        <div class="olc-flex olc-gap-3">
            <button type="submit"
                    class="olc-px-4 olc-py-2 olc-bg-blue-600 olc-text-white olc-font-semibold olc-rounded-lg olc-shadow-md hover:olc-bg-blue-700 focus:olc-outline-none focus:olc-ring-2 focus:olc-ring-blue-500 focus:olc-ring-opacity-75">
                @if(empty($entity->id))
                    Créer l'élément
                @else
                    Enregistrer la modification
                @endif
            </button>
            <button type="submit"
                    name="stay"
                    class="olc-px-4 olc-py-2 olc-bg-blue-600 olc-text-white olc-font-semibold olc-rounded-lg olc-shadow-md hover:olc-bg-blue-700 focus:olc-outline-none focus:olc-ring-2 focus:olc-ring-blue-500 focus:olc-ring-opacity-75">
                @if(empty($entity->id))
                    Créer l'élément et rester
                @else
                    Enregistrer la modification et rester
                @endif
            </button>
        </div>
    </div>

</form>
