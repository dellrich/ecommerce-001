<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistIconComponent extends Component
{
    //rafréchire le cart sans changer la page
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wishlist-icon-component');
    }
}
