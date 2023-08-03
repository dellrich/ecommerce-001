<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\MarqueHome;
use Livewire\WithFileUploads;

class AdminAddMarqueHomeComponent extends Component
{

    use WithFileUploads;
    public $nom;

    public $link;
    public $image;
    public $status = 1;

    public function addMarque()
    {
        $this->validate([
            'nom' => 'required',

           // 'link' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);


        $marque = new MarqueHome();
        $marque ->nom = $this->nom;

        $marque ->link = $this->link;
        $marque ->status = $this->status;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAS('marque',$imageName);
        $marque->image = $imageName;
        $marque->save();
        $this->resetes();
        toastr()->success("marquer enregistré avec succes");



    }
    public function resetes()
    {

        $this->nom= '';
        $this->link= '';
        $this->image= '';
        $this->status= '';


    }
    public function render()
    {
        return view('livewire.admin.admin-add-marque-home-component');
    }
}
