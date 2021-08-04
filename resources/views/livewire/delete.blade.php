<div>
    <form method="post" wire:submit.prevent="delete">
        <x-ldap::confirmation-modal wire:model="deleting">
            <x-slot name="title">Delete {{ $deleting ? ucfirst($this->type) : null }}</x-slot>

            <x-slot name="content">
                You cannot restore this object after deletion.
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-between">
                    <x-ldap::secondary-button wire:click="$set('deleting', false)">Cancel</x-ldap::secondary-button>
                    <x-ldap::danger-button type="submit">Delete</x-ldap::danger-button>
                </div>
            </x-slot>
        </x-ldap::confirmation-modal>
    </form>
</div>