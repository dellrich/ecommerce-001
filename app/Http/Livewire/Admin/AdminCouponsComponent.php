<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{

    public $coupon_id;



    public function deletecoupon()
    {
        $coupon = Coupon::find($this->coupon_id);
      //  unlink('assets/imgs/categories/'.$coupon->image);
        $coupon->delete();
        toastr()->success("Coupon supprimée avec succes");

    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons]);
    }
}
