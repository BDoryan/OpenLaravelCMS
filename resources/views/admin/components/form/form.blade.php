<div class="pb-10">
    <a href="{{ route('admin.crud', ['model' => $model_name]) }}"
       class="text-blue-500 hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-500">< Retour à la liste</a>
</div>

<form class="space-y-6 bg-gray-800 p-6 rounded-lg shadow-md w-1/2 mx-auto" action="" method="POST">
    @csrf

    @if(!empty($entity->id))
        <input class="bg-red-700" type="hidden" name="id" value="{{ $entity->id }}"/>
    @endif

    <x-show-alerts />

    @foreach($fields as $field)
        <div class="flex flex-col">
            @if($field['type'] === 'checkbox')
                <label class="inline-flex items-center cursor-pointer">
                    <input {{ $field['required'] ? 'required' : '' }} type="{{ $field['type'] }}"
                           id="{{ $field['name'] }}" name="{{ $field['name'] }}" value="1" {{ $field['value'] ? 'checked' : '' }} class="sr-only peer">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <label class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $field['name'] }}" class="text-gray-300">{{ $field['label'] }}</label>
                </label>
            @else
                <label for="{{ $field['name'] }}"
                       class="mb-2 text-lg font-medium text-gray-300">{{ $field['label'] }}</label>
                <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                       value="{{ $field['value'] }}"
                       class="px-4 py-2 bg-gray-900 text-gray-300 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @endif
            @error($field['name'])
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    @endforeach
    @if(!empty($entity->id))
        <input class="bg-red-700" type="hidden" name="id" value="{{ $entity->id }}"/>
    @endif

    <div class="flex justify-between">
        <a href="{{ route('admin.crud', ['model' => $model_name]) }}"
           class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-75">
            Annuler et retour
        </a>
        <div class="flex gap-3">
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                @if(empty($entity->id))
                    Créer l'élément
                @else
                    Enregistrer la modification
                @endif
            </button>
            <button type="submit"
                    name="stay"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                @if(empty($entity->id))
                    Créer l'élément et rester
                @else
                    Enregistrer la modification et rester
                @endif
            </button>
        </div>
    </div>

</form>
