@props([
    'active'    => false,
    'type'      => 'a'
])

@if($type == 'a')
    {{--  Anchor tag  --}}
    <a
        {{ $attributes }}
        class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}"
    >
    {{ $slot }}
    </a>
@else
    {{--  Button  --}}
    <button
        {{ $attributes->except(['href']) }}
        class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}"
    >
        {{ $slot }}
    </button>
@endif

