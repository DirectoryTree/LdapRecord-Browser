<li class="relative flex flex-col px-4">
    <div class="flex items-center justify-between py-4">
        <div class="flex items-center mx-2">
            <x-ldap::entry.type :type="$type" />

            <div class="ml-2">{{ $name }}</div>
        </div>

        <x-ldap::button wire:click="$emit('selected', '{{ $dn }}')" class="absolute right-0 mr-2 p-1">
            <x-ldap::icons.view />
        </x-ldap::button>

        <x-ldap::button wire:click="toggle" wire:loading.attr="disabled" :disabled="!$expandable"
            class="absolute left-0 -ml-3">
            <div wire:loading.delay>
                <x-ldap::icons.spinner />
            </div>

            <div wire:loading.delay.remove class="{{ $expandable ? 'text-gray-600' : 'text-gray-300' }}">
                @if($expanded)
                <x-ldap::icons.collapse />
                @else
                <x-ldap::icons.expand />
                @endif
            </div>
        </x-ldap::button>
    </div>

    @if($expanded)
    <livewire:ldap.tree :connection="$connection" :base="$dn" :nested="true" :wire:key="$dn" />
    @endif
</li>