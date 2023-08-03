<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;
use Livewire\WithPagination;


class AdminAttributesComponent extends Component
{
    public $attribute_id;
    use WithPagination;

    public function deleteAttribu()
    {



        $attributs = ProductAttribute::find($this->attribute_id);


        //unlink('assets/imgs/categories/'.$category->image);
        $attributs->delete();
        toastr()->success("Attribut supprimée avec succes");
        return redirect()->back();



    }
    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attributes-component',['pattributes' =>$pattributes]);
    }
}
