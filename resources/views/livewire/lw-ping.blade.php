<div>
    <div class="flex flex-col items-center justify-center space-y-6 text-center">
        <h1 class="text-4xl font-bold tracking-normal sm:text-5xl lg:text-6xl">Ping Tester</h1>
        <p class="max-w-screen-sm text-lg text-gray-600 sm:text-2xl">Enter an IP address to perform a ping test.</p>
        <form wire:submit.prevent="ping" class="flex w-full max-w-md items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3">
            <input wire:model.defer="ip_address" type="text" required class="w-full rounded-md border bg-gray-50 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="IP Address"/>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Ping</button>
        </form>
    </div>

    <div class="mt-8">
        @if (!empty($pingResult))
            <h2 class="text-xl font-semibold">Ping Result for {{ $ip_address }}</h2>
            <div class="mt-4">
                <pre>{{ $pingResult }}</pre>
            </div>
        @endif
    </div>
</div>
