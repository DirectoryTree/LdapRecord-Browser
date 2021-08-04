<div class="absolute inset-0">
    @php
    $types = [
    'success' => 'bg-green-600',
    ];
    @endphp

    @if($type && $message)
    <div class="relative {{ $types[$type] ?? 'bg-indigo-600' }}">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    {{ $message }}
                </p>
            </div>

            <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                <button wire:click="dismiss" type="button" x-data="() => {
                        setTimeout(() => $wire.dismiss(), 5000);
                        return {};
                    }" class="flex p-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-white">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @endif
</div>