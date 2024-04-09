<div>
    <div class="flex flex-col items-center justify-center space-y-6 text-center">
        <h1 class="text-4xl font-bold tracking-normal sm:text-5xl lg:text-6xl">WHOIS Tool</h1>
        <p class="max-w-screen-sm text-lg text-gray-600 sm:text-2xl">Enter a domain name to perform WHOIS lookup.</p>
        <form wire:submit.prevent="lookup" class="flex w-full max-w-md flex-col items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3">
            <input wire:model.defer="url" type="text" required class="w-full rounded-md border bg-gray-50 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Domain Name"/>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Lookup</button>
        </form>
    </div>

    <div class="mt-8">
        @if (!empty($info))
            @if (is_array($info))
                <h2 class="text-xl font-semibold">Domain Information</h2>
                <ul class="mt-4 list-disc list-inside">
                    @foreach ($info as $key => $value)
                        <li><strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : htmlspecialchars($value) }}</li>
                    @endforeach
                </ul>
            @else
                <p>No information available.</p>
            @endif
        @endif    
    </div>
</div>
