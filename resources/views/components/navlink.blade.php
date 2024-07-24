<a {{ $attributes }} class="{{ $active ? 'text-lime-600 font-bold' : 'text-sm text-gray-400 hover:text-gray-500' }}"
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
