<?php

namespace App\Http\Livewire;

use Cart;
use toastr;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\MarqueHome;
use App\Models\InfoEnteteHome;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{

    public function store($product_id, $product_name, $product_prix)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_prix)->associate('\App\Models\Product');
        // session()->flash('success_message', 'Article ajouter au Panier');
        toastr()->success("Article ajouter au Panier ");
       // $this->emitTo('wishlist-icon-component', 'refreshComponent');
        // return redirect()->route('boutique.cart');
        // return redirect()->back();
        return redirect()->route('home.index');
    }
    public function addToWishlist($product_id, $product_name, $product_prix)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_prix)->associate('\App\Models\Product');
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
        toastr()->success("Article ajouter a la liste des Favoris ");
        return redirect()->route('home.index');
    }

    //enlever de la liste de souhait
    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            # code...

            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');
                toastr()->success("Article retirer de la liste des Favoris ");
                return redirect()->route('home.index');
            }
        }
    }

    public function render()
    {
        $slides = HomeSlider::where('status', 1)->get();
        $pcategories = Category::where('est_populaire', 1)->inRandomOrder()->get()->take(12);



        $new3products = Product::orderBy('created_at', 'DESC')->get()->take(3);
        $marques = MarqueHome::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(4);

        $fproducts = Product::where('en_vedette', '1')->inRandomOrder()->get()->take(10);

        if (Auth::check()) {
            cart::instance('cart')->restore(Auth::user()->email);
            cart::instance('wishlist')->restore(Auth::user()->email);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.home-component', ['new3products' => $new3products, 'categories' => $categories, 'slides' => $slides, 'lproducts' => $lproducts, 'lproducts' => $lproducts, 'fproducts' => $fproducts, 'pcategories' => $pcategories, 'marques' => $marques]);
    }
}
