<div class="flex flex-col md:flex-row md:space-x-4">
    <div class="w-full h-full md:w-1/4 bg-white shadow rounded-lg mb-4 text-sm">
        <label class="relative block p-2 border-b border-gray-200">
            <div class="absolute inset-y-0 left-0 flex items-center justify-center px-4 py-2 opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="text-ui-typo feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>

            <button type="button" tabindex="-1"
                class="block w-full py-2 pl-10 pr-4 border text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Search directory...
            </button>
        </label>

        <livewire:ldap.tree />
    </div>

    <div class="w-full md:w-3/4">
        <livewire:ldap.viewer />
    </div>
</div>