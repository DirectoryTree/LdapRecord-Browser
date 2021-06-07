<x-ldap::tree :nested="$nested">
    @forelse($entries as $entry)
    <livewire:ldap.leaf :entry="$entry" :connection="$connection" :wire:key="$entry->getConvertedGuid()" />
    @empty
    <div class="text-sm text-gray-600 -ml-2 py-4">No nested objects found.</div>
    @endforelse
</x-ldap::tree>