<div class="inline-flex gap-3">
    <a href="{{ route('admin.crud.update', ['model' => $model, 'id' => $id]) }}"
       class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
        Modifier
    </a>
    <form action="{{ route('admin.crud.delete', ['model' => $model, 'id' => $id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-75">
            Supprimer
        </button>
    </form>
</div>
