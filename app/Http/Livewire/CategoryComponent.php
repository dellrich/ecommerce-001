<?php

namespace App\Http\Livewire;

use Cart;
use toastr;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithPagination;
use function Termwind\render;

class CategoryComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = "défaut";
    public $slug;
    public $sslug;
    public $min_value = 0;
    public $max_value = 1000;

    public function store($product_id, $product_name, $product_prix)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_prix)->associate('\App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
       // session()->flash('success_message', 'Article ajouter au Panier');
       toastr()->success("Article ajouter au Panier ");

        //return redirect()->route('boutique.cart'); route('product.category', ['slug' => $category->slug])
        return redirect()->route('product.category', ['slug' =>$this->slug]);
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

    public function mount($slug,$sslug=null)
    {
        $this->slug = $slug;
        $this->sslug = $sslug;
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
        $category_id= null;
        $category_name= null;
        $filter="";


        if($this->sslug)
        {
            $scategory = Subcategory::where('slug',$this->sslug)->first();
            $category_id= $scategory->id;
            $category_name=  $scategory->name;
            $filter="sous";

        }else{

             $category = Category::where('slug', $this->slug)->first();
        $category_id = $category->id;
        $category_name =$category->name;
        $filter="";


        }



        if($this->orderBy == "Prix : Du plus bas au plus haut")
        {
            $products = Product::where($filter.'category_id',$category_id)->orderBy('prix_normale','ASC')->paginate($this->pageSize);

        }else if($this->orderBy == "Prix : du plus haut au plus bas")

        {
            $products = Product::where($filter.'category_id',$category_id)->orderBy('prix_normale','DESC')->paginate($this->pageSize);

        }else if($this->orderBy == "nouveauté")

        {
            $products = Product::where($filter.'category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pageSize);

        }else
        {
            $products = Product::where($filter.'category_id',$category_id)->paginate($this->pageSize);
        }

        //paginer avec livewire

        $categories = Category::orderBy('name', 'ASC')->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(3);

        return view('livewire.category-component',['products' => $products,'categories' => $categories,'category_name'=>$category_name,'lproducts'=>$lproducts]);
    }
}
