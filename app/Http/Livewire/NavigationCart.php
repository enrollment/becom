<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavigationCart extends Component
{   
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
