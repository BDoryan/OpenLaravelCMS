<a href="{{ $route }}"
   class="px-4 py-2 hover:bg-gray-700 {{ request()->is($route) ? 'bg-gray-700' : '' }}">
    <i class="{{ $icon }} w-[28px]"></i>
    {{ $label }}
</a>
