<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $est_populaire;
    public $newimage;

    public $subcategory_id;
    public $scategory_lug;

    public function mount($category_id, $subcategory_id = null)
    {

        if ($subcategory_id) {

            $scategory = Subcategory::find($subcategory_id);
            $this->subcategory_id = $scategory->id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
            $this->image = $scategory->image;
            $this->est_populaire = $scategory->est_populaire;
        } else {

            $category = Category::find($category_id);
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->est_populaire = $category->est_populaire;
        }
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required'
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        if ($this->subcategory_id) {

            $scategory = Subcategory::find($this->subcategory_id);
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            if ($this->newimage) {
                // unlink('assets/imgs/categories/'.$category->image);
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('categories', $imageName);
                $scategory->image = $imageName;
            }


            $scategory->est_populaire = $this->est_populaire;
            $scategory->save();
            if($scategory)
            {
                toastr()->success("La sous-categorie à été ajoutée avec succes!!!");
                return redirect()->route('admin.categories');
            }
            
        } else {
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            if ($this->newimage) {
                // unlink('assets/imgs/categories/'.$category->image);
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('categories', $imageName);
                $category->image = $imageName;
            }


            $category->est_populaire = $this->est_populaire;
            $category->save();
            if($category)
            {
                toastr()->success("La categorie à été ajoutée avec succes!!!");
                return redirect()->route('admin.categories');
            }
            
        }
    }

    public function render()
    {
        $categories = Category::all();


        return view('livewire.admin.admin-edit-category-component', ['categories' => $categories]);
    }
}
