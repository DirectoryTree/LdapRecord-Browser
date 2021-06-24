@props(['id' => null, 'maxWidth' => null])

<x-ldap::modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right rounded-b-lg">
        {{ $footer }}
    </div>
</x-ldap::modal>