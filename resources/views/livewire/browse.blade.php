<div class="flex flex-col md:flex-row md:space-x-4">
    <div class="w-full h-full md:w-1/4 bg-white shadow rounded-lg mb-4 text-sm">
        <livewire:ldap.tree :connection="$connection" />
    </div>

    <div class="w-full md:w-3/4">
        <livewire:ldap.viewer :connection="$connection" />
    </div>
</div>