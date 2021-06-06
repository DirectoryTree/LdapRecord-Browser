<button type="button" {{ $attributes->merge(['class' => 'justify-center inline-flex items-center p-1 border
    border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50
    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}
    >
    {{ $slot }}
</button>