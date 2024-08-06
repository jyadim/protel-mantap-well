@props(['active' => false ])

<a {{ $attributes }} class="{{ $active ? 'text-lime-600 font-bold' : 'text-sm text-gray-400 hover:text-lime-600' }}"
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
