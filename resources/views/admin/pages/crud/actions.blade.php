<div class="olc-inline-flex olc-gap-3">
    <a href="{{ route('admin.crud.update', ['model' => $model, 'id' => $id]) }}"
       class="olc-px-4 olc-py-2 olc-bg-blue-600 olc-text-white olc-font-semibold olc-rounded-lg olc-shadow-md hover:olc-bg-blue-700 focus:olc-outline-none focus:olc-ring-2 focus:olc-ring-blue-500 focus:olc-ring-opacity-75">
        Modifier
    </a>
    <form action="{{ route('admin.crud.delete', ['model' => $model, 'id' => $id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="olc-px-4 olc-py-2 olc-bg-red-600 olc-text-white olc-font-semibold olc-rounded-lg olc-shadow-md hover:olc-bg-red-700 focus:olc-outline-none focus:olc-ring-2 focus:olc-ring-red-500 focus:olc-ring-opacity-75">
            Supprimer
        </button>
    </form>
</div>
