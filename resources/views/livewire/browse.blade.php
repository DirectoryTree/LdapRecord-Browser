<div class="flex flex-col md:flex-row md:space-x-4">
    <livewire:ldap.flash />

    <div class="w-full h-full md:w-1/4 bg-white shadow rounded-lg mb-4 text-sm">
        <livewire:ldap.search />

        <livewire:ldap.tree />
    </div>

    <div class="w-full md:w-3/4">
        <livewire:ldap.viewer />
    </div>
</div>