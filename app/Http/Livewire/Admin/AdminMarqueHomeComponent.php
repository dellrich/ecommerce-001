<?php

namespace App\Http\Livewire\Admin;

use App\Models\MarqueHome;
use Livewire\Component;

class AdminMarqueHomeComponent extends Component
{

    public $marque_id;

    public function deleteMarque()
    {
        $marque = MarqueHome::find($this->marque_id);
        unlink('assets/imgs/marque/'.$marque->image);
        $marque->delete();
        toastr()->success("Message","Marque supprimé avec succes!!");

    }
    public function render()
    {
        $marques =MarqueHome::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-marque-home-component',['marques' => $marques]);
    }
}
