{{-- <!DOCTYPE html>
<html>
<head>
    <title>Ping Checker</title>
</head>
<body>
    <h1>Ping Checker</h1>

    <form method="post" action="/ping">
        @csrf
        <label for="ip_address">Enter IP Address:</label>
        <input type="text" id="ip_address" name="ip_address">
        <button type="submit">Ping</button>
    </form>
</body>
</html> --}}

<x-admin-layout>
    <livewire:ping/>
</x-admin-layout>