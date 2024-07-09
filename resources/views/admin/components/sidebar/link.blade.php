<a href="{{ $route }}"
   class="olc-px-4 olc-py-2 hover:olc-olc-bg-gray-700 {{ request()->is($route) ? 'olc-bg-gray-700' : '' }}">
    <i class="{{ $icon }} olc-w-[28px]"></i>
    {{ $label }}
</a>
