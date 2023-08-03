<?php

namespace App\Http\Livewire\Admin;

use toastr;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $category_id;
    public $image;
    public $est_populaire=0;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required'
        ]);

        if($this->category_id)
        {   
            $scategory = new Subcategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAS('categories',$imageName);
            $scategory->image = $imageName;
    
            $scategory->est_populaire = $this->est_populaire;
    
            $scategory->save();
            if($scategory)
            {
                $this->resetes();
                toastr()->success("Sous-Categorie ajouté avec succes");
                return redirect()->back();

            }


        }else{

            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAS('categories',$imageName);
            $category->image = $imageName;
    
            $category->est_populaire = $this->est_populaire;
    
            $category->save();
            if($category)
            {
                $this->resetes();
                toastr()->success("Categorie ajouté avec succes");
                return redirect()->back();

            }
           

        }

       
        $this->resetes();
        toastr()->success("Categorie ajouté avec succes");


    }
    public function resetes()
    {

        $this->name = '';
        $this->slug = '';
        $this->image= '';
        $this->est_populaire= '';

    }


    public function render()
    {
        $categories =Category::all();

        return view('livewire.admin.admin-add-category-component',['categories' => $categories]);
    }
}
