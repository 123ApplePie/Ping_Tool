<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Shell;

class LwPing extends Component
{
    public $ip_address;
    public $pingResult;

    public function render()
    {
        return view('livewire.lw-ping');
    }

    public function ping()
    {
        $this->validate([
            'ip_address' => 'required|ip', // Validate IP address input
        ]);

        // Execute ping command (adjust based on your system)
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows command (use -n instead of -c)
            $command = "ping -n 4 " . escapeshellarg($this->ip_address);
        } else {
            // Unix-based command (use -c for Unix-like systems)
            $command = "ping -c 4 " . escapeshellarg($this->ip_address);
        }

        // Execute the ping command
        $output = shell_exec($command);

        $this->pingResult = $output;
    }}
