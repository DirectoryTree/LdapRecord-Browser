<div>
    <form method="post" wire:submit.prevent="delete">
        <x-ldap::confirmation-modal wire:model="deleting">
            <x-slot name="title">Delete <strong>{{ $deleting ? ucfirst($this->type) : null }}</strong> Object?</x-slot>

            <x-slot name="content" class="space-y-4">
                <p>Are you sure you want to delete:</p>

                <p class="font-semibold">{{ $deleting ? $this->name : null }}</p>

                <p>You cannot restore this object after deletion.</p>
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