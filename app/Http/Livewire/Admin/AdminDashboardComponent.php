<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use toastr;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders= Order::orderBy('created_at','DESC')->get()->take(10);
        $totalVentes =Order::where('status','delivered')->count();
        $totalVentesannuler =Order::where('status','canceled')->count();
        $totalRevenues =Order::where('status','delivered')->sum('total');
        $todayVentes = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenues = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-dashboard-component',[
            'orders' => $orders,
            'totalVentes' => $totalVentes,
            'todayRevenues' => $todayRevenues,
            'totalRevenues' => $totalRevenues,
            'todayVentes' => $todayVentes,
            'totalVentesannuler' =>$totalVentesannuler
        ]);
    }
}
