<ul class="flex flex-col space-y-4 md:mx-auto max-w-sm">
    @forelse($connections as $connection)
    <li
        class="relative flex bg-white shadow overflow-hidden rounded-md px-6 py-4 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
        <a href="{{ route('ldap::browse', $connection) }}" class="focus:outline-none inline-flex items-center">
            <span class="absolute inset-0" aria-hidden="true"></span>
            <x-ldap::icons.connection class="mr-2 h-8 w-8 text-gray-600" />
            {{ ucfirst($connection) }}
        </a>
    </li>
    @empty
    <div
        class="border-2 border-dashed rounded-lg text-sm text-center uppercase tracking-wide text-gray-400 font-medium p-4">
        No connections found.
    </div>
    @endforelse
</ul>