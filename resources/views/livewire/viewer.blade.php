<div>
    <livewire:ldap.rename />
    <livewire:ldap.delete />

    @if($guid)
    <div class="border rounded-lg bg-white shadow-sm relative">
        <div class="absolute right-0 -mt-3 -mr-3">
            <livewire:ldap.actions :guid="$this->model->getConvertedGuid()" :key="$this->model->getConvertedGuid()" />
        </div>

        <div class="flex flex-col border-b p-4">
            <div class="flex items-center">
                <x-ldap::entry.type :type="$this->type" />
                <span class="ml-1">{{ $this->model->getName() }}</span>
            </div>

            <div class="text-sm font-medium text-gray-400">{{ $this->model->getDn() }}</div>
        </div>

        <div class="overflow-auto whitespace-nowrap">
            <dl class="grid grid-cols-1">
                @foreach ($this->attributes as $attribute => $values)
                <div class="mx p-4">
                    <dt class="text-sm font-medium text-gray-600">
                        <a id="{{ $attribute }}" href="#{{ $attribute }}">{{ $attribute }}</a>
                    </dt>

                    <dd class="overflow-auto rounded-lg text-sm bg-gray-50 text-gray-900 mt-1 p-2 space-y-2">
                        @foreach ($values as $value)
                        <div class="flex items-center gap">
                            @if($this->isDn($value) && $value !== $this->model->getDn())
                            <x-ldap::tiny-button wire:click="$emit('model.discover', '{{ $value }}')" class="mr-2 p-1">
                                <x-ldap::icons.view />
                            </x-ldap::tiny-button>
                            @endif
                            
                            <code class="block">{{ $value }}</code>
                        </div>
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