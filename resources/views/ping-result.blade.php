<!DOCTYPE html>
<html>
<head>
    <title>Ping Result</title>
</head>
<body>
    <h1>Ping Result for {{ $pingResult['host'] }}</h1>

    <p>Packet Count: {{ $pingResult['packetCount'] }}</p>
    <p>Packet Loss Count: {{ $pingResult['packetLossCount'] }}</p>

    <h2>Ping Times (ms):</h2>
    <ul>
        @foreach ($pingResult['pingTimes'] as $pingTime)
            <li>{{ $pingTime }}</li>
        @endforeach
    </ul>
</body>
</html>
