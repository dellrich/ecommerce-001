<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttributesComponent extends Component
{
    public $name;

    public function update($fields)
    {
        $this->validateOnly($fields,[
            "name" =>"required"
        ]);
    }

    public function storeAttributes()
    {
        $this->validate([
            "name" =>"required"
        ]);
        $pattribute = new ProductAttribute();
        $pattribute ->name =$this->name;
        $pattribute->save();
        if($pattribute)
        {
              $this->resetes();
        toastr()->success("Attribut ajouté avec succes");
        notify()->success("Attribut ajouté avec succes");

        return redirect()->route('admin.add_attributes');
        }

    }


    public function resetes()
       {

           $this->name = '';


       }
    public function render()
    {
        return view('livewire.admin.admin-add-attributes-component');
    }
}
