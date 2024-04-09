<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class LwUsers extends Component
{
    public $search;
    public $check = [];
    public $deactivated = [];
    protected $listeners = [
        'refreshComponent' => 'refreshComponent'
    ];
    
    public function refreshComponent()
    {
        $this->render();
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.lw-users',[
            'users' => $users
        ]);
    }
}
