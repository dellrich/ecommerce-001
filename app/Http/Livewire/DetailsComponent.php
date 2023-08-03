<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class DetailsComponent extends Component
{
    public $slug;
    public $min_value = 0;
    public $max_value = 1000;
    public $qty;
    public $satt=[];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty =1;
        
    }


    public function store($product_id, $product_name, $product_prix)

    {
        //ajouter article au parnier
        Cart::instance('cart')->add($product_id, $product_name,$this->qty, $product_prix,$this->satt)->associate('\App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');


        toastr()->success("Article ajouter au Panier ");
        return redirect()->route('product.details', ['slug' =>$this->slug]);
       // return redirect()->back();
    }

    public function addToWishlist($product_id, $product_name, $product_prix)
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_prix)->associate('\App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
    }

    //enlever de la liste de souhait
     public function removeFromWishlist($product_id)
     {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            # code...

            if($witem->id==$product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;

            }
        }
     }
     public function increaseQuantity()
    {
      
       $this->qty++;
      

    }

    public function decreaseQuantity()
    {
       
        $this->qty--;

    }

    public function render()
    {
         //afficher un article selectionner
        $product =Product::where('slug', $this->slug)->first();
        // afficher de proroser des 4 article similaire
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
         // afficher de proroser des  4 dernier article
        $nproducts = Product::latest()->take(4)->get();
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('livewire.details-component',['product' => $product,'rproducts'=>$rproducts,'nproducts'=>$nproducts,'categories'=>$categories]);
    }
}
