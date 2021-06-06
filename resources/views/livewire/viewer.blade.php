<div>
    @if($entry)
    <div class="border rounded-lg bg-white shadow-sm">
        <div class="flex flex-col border-b p-4">
            <div>{{ $entry->getName() }}</div>
            <div class="text-sm font-medium text-gray-400">{{ $entry->getDn() }}</div>
        </div>

        <div class="overflow-auto whitespace-nowrap">
            <dl class="grid grid-cols-1 md:grid-cols-2">
                @foreach ($entry->attributesToArray() as $attribute => $values)
                <div class="mx p-4">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ $attribute }}
                    </dt>

                    <dd class="mt-1 text-sm text-gray-900 overflow-auto">
                        @foreach ($values as $value)
                        {{ $value }}
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