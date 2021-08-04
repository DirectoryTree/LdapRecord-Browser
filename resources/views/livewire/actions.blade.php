<div>
    <x-ldap::dropdown>
        <x-slot name="trigger">
            <x-ldap::tiny-button>
                <x-ldap::icons.options />
            </x-ldap::tiny-button>
        </x-slot>

        <x-slot name="content">
            <x-ldap::dropdown-link wire:click.prevent="$emit('model.renaming', '{{ $guid }}')" href="#">
                Rename
            </x-ldap::dropdown-link>

            <hr />

            <x-ldap::dropdown-link wire:click.prevent="$emit('model.deleting', '{{ $guid }}')" href="#">
                Delete
            </x-ldap::dropdown-link>
        </x-slot>
    </x-ldap::dropdown>
</div>