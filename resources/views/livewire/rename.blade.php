<div>
    <form method="post" wire:submit.prevent="rename">
        <x-ldap::dialog-modal wire:model="renaming">
            <x-slot name="title">Rename {{ $renaming ? ucfirst($this->type) : null }}</x-slot>

            <x-slot name="content">
                <x-ldap::label>Name</x-ldap::label>
                <x-ldap::input name="name" wire:model="form.name" />
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-between">
                    <x-ldap::secondary-button wire:click="$set('renaming', false)">Cancel</x-ldap::secondary-button>
                    <x-ldap::button type="submit" wire:click="rename">Save</x-ldap::button>
                </div>
            </x-slot>
        </x-ldap::dialog-modal>
    </form>
</div>