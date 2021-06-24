<div>
    <x-ldap::dropdown>
        <x-slot name="trigger">
            <x-ldap::tiny-button>
                <x-ldap::icons.options />
            </x-ldap::tiny-button>
        </x-slot>

        <x-slot name="content">
            <x-ldap::dropdown-link wire:click.prevent="$set('renaming', true)" href="#">Rename</x-ldap::dropdown-link>
            <hr />
            <x-ldap::dropdown-link href="#">Delete</x-ldap::dropdown-link>
        </x-slot>
    </x-ldap::dropdown>

    <x-ldap::dialog-modal wire:model="renaming">
        <form method="post" wire:submit.prevent="rename">
            <x-slot name="title">Rename {{ ucfirst($type) }}</x-slot>

            <x-slot name="content">
                <x-ldap::label>Name</x-ldap::label>
                <x-ldap::input name="name" wire:model="name" />
            </x-slot>

            <x-slot name="footer">
                <x-ldap::button type="submit" wire:click="rename">Save</x-ldap::button>
            </x-slot>
        </form>
    </x-ldap::dialog-modal>
</div>