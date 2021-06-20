<div>
    @if($entry)
    <div class="border rounded-lg bg-white shadow-sm relative">
        <div class="absolute right-0 -mt-3 -mr-3">
            <x-ldap::dropdown>
                <x-slot name="trigger">
                    <x-ldap::button>
                        <x-ldap::icons.options />
                    </x-ldap::button>
                </x-slot>

                <x-slot name="content">
                    <x-ldap::dropdown-link href="#">Rename</x-ldap::dropdown-link>
                    <hr />
                    <x-ldap::dropdown-link href="#">Delete</x-ldap::dropdown-link>
                </x-slot>
            </x-ldap::dropdown>
        </div>

        <div class="flex flex-col border-b p-4">
            <div class="flex items-center">
                <x-ldap::entry.type :type="$type" />
                <span class="ml-1">{{ $entry->getName() }}</span>
            </div>
            <div class="text-sm font-medium text-gray-400">{{ $entry->getDn() }}</div>
        </div>

        <div class="overflow-auto whitespace-nowrap">
            <dl class="grid grid-cols-1 md:grid-cols-2">
                @foreach ($entry->attributesToArray() as $attribute => $values)
                <div class="mx p-4">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ $attribute }}
                    </dt>

                    <dd class="overflow-auto rounded-lg text-sm bg-gray-100 text-gray-900 mt-1 p-2">
                        @foreach ($values as $value)
                        <code class="bg">{{ $value }}{{ $loop->last ? null : ',' }}</code>
                        @endforeach
                    </dd>
                </div>
                @endforeach
            </dl>
        </div>
    </div>
    @else
    <div
        class="border-2 border-dashed rounded-lg text-sm text-center uppercase tracking-wide text-gray-400 font-medium p-4">
        Select an object
    </div>
    @endif
</div>