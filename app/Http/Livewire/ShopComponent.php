<?php

namespace App\Http\Livewire;

use Cart;
use toastr;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use function Termwind\render;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ='bootstrap';

    public $pageSize = 12;
    public $orderBy = "défaut";

    public $min_value = 0;
    public $max_value = 1000;

    public function store($product_id, $product_name, $product_prix)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_prix)->associate('\App\Models\Product');
       // session()->flash('success_message', 'Article ajouter au Panier');
       // notify()->success("Article ajouter au Panier ");

        $this->emitTo('wishlist-icon-component','refreshComponent');
        toastr()->success('Article ajouter au Panier!','Felicitation');
       // return redirect()->route('boutique.cart');
       return redirect()->route('boutique');



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

        if($this->orderBy == "Prix : Du plus bas au plus haut")
        {
            $products = Product::whereBetween('prix_normale',[$this->min_value,$this->max_value])->orderBy('prix_normale','ASC')->paginate($this->pageSize);

        }else if($this->orderBy == "Prix : du plus haut au plus bas")

        {
            $products = Product::whereBetween('prix_normale',[$this->min_value,$this->max_value])->orderBy('prix_normale','DESC')->paginate($this->pageSize);

        }else if($this->orderBy == "nouveauté")

        {
            $products = Product::whereBetween('prix_normale',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->pageSize);

        }
        else if($this->orderBy)
        {
            $products = Product::paginate($this->pageSize);
        }

        else
        {
            $products = Product::whereBetween('prix_normale',[$this->min_value,$this->max_value])->paginate($this->pageSize);
        }


        //paginer avec livewire

        $categories = Category::orderBy('name', 'ASC')->get();

        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(4);

        if(Auth::check())
        {
            cart::instance('cart')->store(Auth::user()->email);
            cart::instance('wishlist')->store(Auth::user()->email);
        }



        return view('livewire.shop-component',['products' => $products,'categories' => $categories,'lproducts'=>$lproducts]);
    }
}
