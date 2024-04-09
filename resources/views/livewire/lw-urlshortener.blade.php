<div class="flex flex-col items-center justify-center space-y-6 text-center">
    <h1 class="text-4xl font-bold tracking-normal sm:text-5xl lg:text-6xl">URL Shortener</h1>
    <p class="max-w-screen-sm text-lg text-gray-600 sm:text-2xl">Enter a URL to generate a shortened link.</p>
    <form wire:submit.prevent="shorten" class="flex w-full max-w-md flex-col items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3">
        <input wire:model.lazy="originalUrl" required type="text" class="w-full rounded-md border bg-gray-50 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter URL"/>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Shorten</button>
    </form>

    @if ($shortenedUrl)
        <div class="mt-4 p-4 border rounded-md bg-gray-100">
            <p class="text-lg font-bold text-gray-800">Shortened URL:</p>
            <a href="{{ $shortenedUrl }}" target="_blank" class="block text-blue-600 hover:underline">{{ $shortenedUrl }}</a>
        </div>
    @endif
</div>
