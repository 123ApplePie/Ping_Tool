<?php

namespace App\Livewire;

use Larva\Whois\Whois;
use Livewire\Component;

class LwWhois extends Component
{
    public $url;
    public $info;

    public function render()
    {
        return view('livewire.lw-whois');
    }

    public function lookup()
    {
        if ($this->url) {
            // Perform WHOIS lookup
            $result = Whois::lookup($this->url);

            // Store result in $info
            $this->info = $result;
        }
    }
}
