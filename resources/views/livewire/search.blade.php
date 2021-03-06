<div>
    <label class="relative block p-2 border-b border-gray-200">
        <div class="absolute inset-y-0 left-0 flex items-center justify-center px-4 py-2 opacity-50">
            <x-ldap::icons.view />
        </div>

        <button wire:click="$set('searching', true)" type="button" tabindex="-1"
            class="block w-full py-2 pl-10 pr-4 border text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Search directory...
        </button>
    </label>

    <x-ldap::modal wire:model="searching">
        <div class="p-4">
            <x-ldap::input
                autofocus
                type="search"
                class="w-full"
                placeholder="Type to search..." 
                wire:model.debounce.500ms="term"
            />
        </div>

        @if($this->results)
        <hr class="my-1" />

        @if($this->results->isEmpty())
        <div class="flex items-center justify-center text-gray-500 p-4">
            No results.
        </div>
        @else
        <x-ldap::tree :nested="false">
            @foreach($this->results as $entry)
            <livewire:ldap.leaf :guid="$entry->getConvertedGuid()" :wire:key="$entry->getConvertedGuid()" />
            @endforeach
        </x-ldap::tree>
        @endif
        @endif
    </x-ldap::modal>
</div>