<?php

namespace App\Livewire;

use Livewire\Component;

class LwUrlshortener extends Component
{
    public $originalUrl;
    public $shortenedUrl;

    public function shorten()
    {
        // Generate a unique short code based on the original URL (you can use other methods)
        $shortenedCode = substr(md5($this->originalUrl), 0, 8);

        // Construct the shortened URL
        $this->shortenedUrl = "shorturl.of/{$shortenedCode}";
    }
        
    public function render()
    {
        return view('livewire.lw-urlshortener');
    }
}
