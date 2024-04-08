<?php

namespace App\Livewire;

use Livewire\Component;

class Ping extends Component
{
    public $ip_address;
    public $pingResult;

    public function render()
    {
        return view('livewire.ping');       
    }

    public function ping()
    {
        // Perform custom ping using PHP sockets
        $this->pingResult = $this->performPing($this->ip_address);
    }

    private function performPing($ipAddress)
    {
        $packetCount = 4; // Number of packets to send
        $timeout = 1; // Socket timeout in seconds
        $pingTimes = [];
        $bytesSent = 64; // Bytes of data to send in each packet (ICMP-like echo request)
    
        for ($i = 0; $i < $packetCount; $i++) {
            $startTime = microtime(true);
            $socket = @fsockopen('udp://' . $ipAddress, 0, $errno, $errstr, $timeout);
    
            if ($socket) {
                stream_set_timeout($socket, $timeout); // Set socket timeout
                $data = str_repeat('A', $bytesSent); // Prepare data to send (e.g., 'AAAA...')
    
                fwrite($socket, $data); // Send data
                $response = fread($socket, 255); // Read response (if needed)
                
                $endTime = microtime(true);
                $pingTimeMs = round(($endTime - $startTime) * 1000, 2);
                $pingTimes[] = $pingTimeMs;
    
                fclose($socket); // Close socket
            } else {
                $pingTimes[] = null; // Indicates packet loss
            }
        }
    
        $packetLossCount = count(array_filter($pingTimes, function ($time) {
            return $time === null;
        }));
        $pingTimes = array_filter($pingTimes); // Remove null values (packet loss)
    
        // Determine status based on packet loss count
        $status = ($packetLossCount === 0) ? 'Up' : 'Down';
    
        $pingResult = [
            'host' => $ipAddress,
            'packetCount' => $packetCount,
            'packetLossCount' => $packetLossCount,
            'pingTimes' => $pingTimes,
            'bytesSent' => $bytesSent,
            'status' => $status,
        ];
    
        return $pingResult;
    }
}
