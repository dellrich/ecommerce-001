<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order ->status = $status;
        if($status=="delivered")
        {
            $order->delivrer_date = DB::raw('CURRENT_DATE');

        }
        else if($status=="canceled")
        {
            $order->annuler_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        if($order)
        {
            toastr()->success("L'état de la commande a été mis à jour avec succès!!");
            return redirect()->route('admin.commandes');
        }
        //session()->flash('order_message','Order status has been updated successfully');
        //session()->toastr()->success("order_message","L'état de la commande a été mis à jour avec succès!!");
       // session()->

    }
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders' => $orders]);
    }
}
