<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartIconComponent extends Component
{
    //rafréchire le cart sans changer la page
    protected $listeners = ['refreshComponent'=>'$refresh'];


    public function destroy($id)
    {

        Cart::instance('cart')->remove($id);

        $this->emitTo('cart-icon-component','refreshComponent');
        // return redirect()->back();
         toastr()->success("Article vient d'etre retiré!");
    }


    public function render()
    {


        return view('livewire.cart-icon-component');
    }
}
