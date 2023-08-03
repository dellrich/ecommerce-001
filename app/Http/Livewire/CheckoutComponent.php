<?php

namespace App\Http\Livewire;

use App\Mail\CommandeMail;
use Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\TransfertBancaire;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;

class CheckoutComponent extends Component
{

    public $is_shipping_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $zipcode;
    public $country;
    public $companyname;
    public $ordernotes;


    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_zipcode;
    public $s_country;
    public $s_companyname;


    public $paiementmode;
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',

            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'paiementmode' => 'required'


        ]);

        if($this->is_shipping_different)
        {
            $this->validateOnly($fields,[
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',

                's_city' => 'required',
                's_province' => 'required',
                's_zipcode' => 'required',
                's_country' => 'required',

            ]);
        }


        if($this->paiementmode == 'card')
        {
            $this->validateOnly($fields,[
            'card_no' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvc' => 'required|numeric'
            ]);
        }



    }



    public function placeOder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',

            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'paiementmode' => 'required'


        ]);

        if($this->paiementmode == 'card')
        {
            $this->validate([
            'card_no' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvc' => 'required|numeric'
            ]);
        }


        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal =Cart::instance('cart')->subtotal();
      //  $order->discount =Cart::instance('cart')->discount() ;
        $order->tax =Cart::instance('cart')->tax;
        $order->total =Cart::instance('cart')->total;
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile  = $this-> mobile;
        $order->line1  = $this->line1;
        $order->line2  = $this->line2;
        $order->city  = $this->city;
        $order->province = $this->province;
        $order->zipcode  = $this-> zipcode;
        $order->country = $this->country;
        $order->companyname  = $this->companyname;
        $order->status ='ordered';
        $order->ordernotes  = $this->ordernotes;
        $order->is_shipping_different  = $this->is_shipping_different ? 1:0 ;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {

            $orderItem = new OrderItem();
            $orderItem ->product_id = $item->id;
            $orderItem ->order_id = $order->id;
            $orderItem ->price = $item->price;
            $orderItem->quantity = $item->qty;
            if($item->options)
            {
                $orderItem->options = serialize($item->options);
            }
            $orderItem->save();
        }

        if($this->is_shipping_different)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',

                's_city' => 'required',
                's_province' => 'required',
                's_zipcode' => 'required',
                's_country' => 'required',

            ]);

            $shipping =new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->mobile  = $this->s_mobile;
            $shipping->line1  = $this->s_line1;
            $shipping->line2  = $this->s_line2;
            $shipping->city  = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->zipcode  = $this->s_zipcode;
            $shipping->country = $this->s_country;
            $shipping->companyname  = $this->s_companyname;
            $shipping->ordernotes  = $this->ordernotes;

            $shipping->save();
        }





        if($this->paiementmode == 'cod')
            {
                $this->makeTransaction($order->id,'en attente');
                $this->resetCart();
            }
         else if($this->paiementmode == 'card')
            {
                $stripe = Stripe::make(env('STRIPE_KEY'));

                try{
                    $token = $stripe->tokens()->create([
                        'card' => [
                            'number' => $this->card_no,
                            'exp_month' => $this->exp_month,
                            'exp_year' => $this->exp_year,
                            'cvc' => $this->cvc
                        ]
                    ]);

                    if(!isset($token['id']))
                    {
                        session()->flash("stripe_error"," Stripe  n'a pas été généré correctement !");
                        $this->thankyou = 0;
                    }

                    $customer = $stripe->customers()->create([
                        'name' => $this->firstname . ' ' . $this->lastname,
                        'email' =>$this->email,
                        'phone' =>$this->mobile,
                        'address' => [
                            'line1' =>$this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                        'shipping' => [
                            'name' => $this->firstname . ' ' . $this->lastname,
                            'address' => [
                                'line1' =>$this->line1,
                                'postal_code' => $this->zipcode,
                                'city' => $this->city,
                                'state' => $this->province,
                                'country' => $this->country
                            ],
                        ],
                        'source' => $token['id']
                    ]);
                        $total=Cart::instance('cart')->total;
                    $charge = $stripe->charges()->create([
                        'customer' => $customer['id'],
                        'currency' => 'EUR',
                        'amount' => $total,
                        'description' => 'Paiement pour la commande N°' . $order->id
                    ]);

                    if($charge['status'] == 'succeeded')
                    {
                        $this->makeTransaction($order->id,'approved');
                        $this->resetCart();
                    }
                    else
                    {
                        session()->flash('stripe_error','Erreur de la transaction!');
                        $this->thankyou = 0;
                    }
                } catch(Exception $e){
                    session()->flash('stripe_error',$e->getMessage());
                    $this->thankyou = 0;
                }
            }

            $this->sendCommandeConfirmationMail($order);
    }



    public function resetCart()
    {
         $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }


    public function makeTransaction($order_id,$status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paiementmode;
        $transaction->status = $status;
        $transaction->save();
    }


    public function sendCommandeConfirmationMail($order)
    {
        Mail::to($order->email)->send(new CommandeMail($order));
    }

    public function verifyForcheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
       } //  else
        //  if (!session()->get('checkout'))
        // {
        //     return redirect()->route('boutique.cart');
        // }
    }

    public function render()
    {
        $this->verifyForcheckout();
        $transfertbnks = TransfertBancaire::orderBy('created_at','DESC')->first();
       // DD($transfertbnks);
        return view('livewire.checkout-component',['transfertbnks'=>$transfertbnks]);
    }
}
