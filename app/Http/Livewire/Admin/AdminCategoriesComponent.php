<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    public $category_id;
    public $souscategory_id;

    use WithPagination;

    public function deleteCategory()
    {



        $category = Category::find($this->category_id);
        $prodcate = Product::find($this->category_id);
        if($prodcate)
        {
            toastr()->error("Cette categorie contien des produits","Eurreur de suppression");
            return redirect()->back();

        }else{
              unlink('assets/imgs/categories/'.$category->image);
        $category->delete();
        toastr()->success("Categorie supprimée avec succes");
        return redirect()->back();
        }


    }


    public function deleteSubcategory()
    {


        $scategory = Subcategory::find($this->souscategory_id);
        $prodcate = Product::find($this->souscategory_id);
        if($prodcate)
        {
            toastr()->error("Cette categorie contien des produits","Eurreur de suppression");
            return redirect()->back();

        }else{
        unlink('assets/imgs/categories/'.$scategory->image);
        $scategory->delete();
        toastr()->success("Sous-categorie supprimée avec succes");
        return redirect()->back();
    }

    }
    public function render()
    {
        $categories = Category::OrderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-categories-component',['categories'=>$categories]);
    }
}
