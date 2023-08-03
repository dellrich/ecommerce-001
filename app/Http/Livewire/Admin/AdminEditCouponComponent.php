<?php

namespace App\Http\Livewire\Admin;

use toastr;
use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{

    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;


    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->coupon_id = $coupon->id;
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
    }



    public function updateCoupon()
    {
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric'

        ]);

        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;

        $coupon->value = $this->value;

        $coupon->cart_value = $this->cart_value;

        $coupon->save();
        if($coupon)
        {
            toastr()->success("Coupon modifié avec succes");
            return redirect()->route('admin.coupons');

        }




    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component');
    }
}
