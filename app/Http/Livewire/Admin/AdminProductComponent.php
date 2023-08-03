<?php

namespace App\Http\Livewire\Admin;

use toastr;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $product_id;
    public $recherTermprod; 

    public function deleteProduct()
    {
        $product = Product::find($this->product_id);
        unlink('assets/imgs/products'.$product->image);
        $product->delete();
        toastr()->success("Produit supprimé avec succes!!");

    }

    public function render()
    {
        // recherche
        $recherch= '%' .$this->recherTermprod . '%';


        $products =Product::where('name','LIKE',$recherch)
                  ->orWhere('status_stock','LIKE',$recherch)
                  ->orWhere('prix_normale','LIKE',$recherch)
                  ->orwhere('prix_promo','LIKE',$recherch)
                  ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
