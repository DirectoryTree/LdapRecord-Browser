<div class="flex flex-col lg:flex-row md:space-x-4 max-w-7xl mx-auto">
    <livewire:ldap.flash />

    <div class="w-full h-full lg:w-1/4 bg-white shadow rounded-lg mb-4 text-sm">
        <livewire:ldap.search />

        <livewire:ldap.tree />
    </div>

    <div class="w-full {{ $guid ? 'lg:w-2/4' : 'lg:w-3/4' }}">
        <livewire:ldap.viewer />
    </div>

    @if($guid)
    <div class="w-full h-full lg:w-1/4 bg-white shadow rounded-lg relative">
        <div class="text-center tracking-wide uppercase text-gray-600 text-sm border-b py-2">Jump to attribute</div>

        <div class="p-4 space-y-1">
            @foreach($this->attributes->keys() as $attribute)
            <div>
                <a href="#{{ $attribute }}" class="underline hover:no-underline text-indigo-700 text-sm">{{ $attribute }}</a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>