<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\MarqueHome;
use Livewire\WithFileUploads;

class AdminEditMarqueHomeComponent extends Component
{

    use WithFileUploads;
    public $nom;

    public $link;
    public $image;
    public $status;
    public $marque_id;
    public $newimage;

    public function mount($marque_id)
    {
        $marque = MarqueHome::find($marque_id);
        $this->nom = $marque->nom;

        $this->link = $marque->link;
        $this->status = $marque->status;
        $this->image = $marque->image;
        $this->marque_id = $marque->id;
    }

    public function updateMarque()
    {
        $this->validate([
            'nom' => 'required',

           // 'link' => 'required',
            'status' => 'required'
        ]);


        $marque = MarqueHome::find($this->marque_id);
        $marque ->nom = $this->nom;

        $marque ->link = $this->link;
        $marque ->status = $this->status;
        if($this->newimage)
        {
            unlink('assets/imgs/marque/'.$marque->image);
             $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAS('marque',$imageName);
            $marque->image = $imageName;
        }


        $marque->save();
        if($marque)
        {
            toastr()->success("marque modifié avec succes");
            return redirect()->route('admin.marque');

        }




    }
    public function render()
    {
        return view('livewire.admin.admin-edit-marque-home-component');
    }
}
