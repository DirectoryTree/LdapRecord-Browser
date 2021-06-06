<ul {{ $attributes->merge(['class' => 'divide-y divide-gray-200'])->class(['overflow-auto whitespace-nowrap max-h-96
    border-t -mr-4 pl-4' => $nested]) }}>
    {{ $slot }}
</ul>