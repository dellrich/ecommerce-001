<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InfoEnteteHome;

class HomeFooterComponent extends Component
{
    public function render()
    {
        $enteteinfo =InfoEnteteHome::orderBy('created_at','DESC')->first();
        return view('livewire.home-footer-component',['enteteinfo'=>$enteteinfo]);
    }
}
