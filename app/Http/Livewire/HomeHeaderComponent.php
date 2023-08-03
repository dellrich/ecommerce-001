<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\InfoEnteteHome;

class HomeHeaderComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $enteteinfo =InfoEnteteHome::orderBy('created_at','DESC')->first();
        return view('livewire.home-header-component',['categories' => $categories,'enteteinfo'=>$enteteinfo]);
    }
}
