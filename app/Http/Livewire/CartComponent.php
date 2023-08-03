<?php

namespace App\Http\Livewire;

use Cart;
use toastr;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{

    public $codecoupon;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;



    //incrementer et decrimenter les ajout de produit sur la cart
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');
        //notify()->success("Augmentation de la quantité");
        toastr()->success("Augmentation de la quantité ");


    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');
       // notify()->success("Réduction de la quantité");
        toastr()->success("Réduction de la quantité ");

    }

    public function destroy($id)
    {
        //supprimer un article
        Cart::instance('cart')->remove($id);
        //session()->flash('success_message',"Article vient d'etre retiré");
        //notify()->success("Article vient d'etre retiré ");
        toastr()->success("Article vient d'etre retiré!");
        $this->emitTo('cart-icon-component','refreshComponent');
        // return redirect()->back();
    }

    public function supprimerTout()
    {
        Cart::instance('cart')->destroy();
       // notify()->success('Panier vidé avec success ');
        toastr()->success("Panier vidé avec success ⚡️",'Felicitation');
        $this->emitTo('cart-icon-component','refreshComponent');
       // return redirect()->back();
    }

    public function appliqueCoupon()
    {
       $tt=Cart::instance('cart')->subtotal();
       // dd(Cart::instance('cart')->subtotal());
        $coupon = Coupon::where('code',$this->codecoupon)->where('cart_value','<=',$tt);
       // dd($coupon);
        if(!$coupon)

        {

           session()->flash('coupon_message','Code Coupon invalide!!!');
            return;
        }

        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value

        ]);

    }

    public function calculeRemise()
    {


        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixe')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->sutotal() * session()->get('coupon')['value'])/100;

            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->totalAfterDiscount + $this->taxAfterDiscount;

        }
    }

    public function suppriCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('boutique.paiement');

        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {

        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }
        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);

        }
        else
        {
            session()->put('checkout',[
                'discount'=> 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()

            ]);
        }
    }


    public function render()
    {

        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else {
                $this->calculeRemise();
            }

        }

        $this->setAmountForCheckout();

        if(Auth::check())
        {
            cart::instance('cart')->store(Auth::user()->email);
            cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.cart-component');
    }
}
