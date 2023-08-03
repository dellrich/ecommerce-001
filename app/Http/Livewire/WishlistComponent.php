<?php

namespace App\Http\Livewire;

use Cart;
use toastr;
use Livewire\Component;

class WishlistComponent extends Component
{

    public function store($product_id, $product_name, $product_prix)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_prix)->associate('\App\Models\Product');
       // session()->flash('success_message', 'Article ajouter au Panier');
        toastr()->success("Article ajouter au Panier ");
        $this->emitTo('wishlist-icon-component','refreshComponent');
        return redirect()->route('boutique.cart');
    }
    //afficher la list suivant la taille
    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }
    //filtrer par ordre
    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }
    //ajout liste souhait
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

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
