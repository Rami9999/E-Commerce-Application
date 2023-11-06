<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id=$order_id;
        
    }
    public function cancel($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "canceled";
        $order->canceled_date = DB::raw("CURRENT_DATE");
        $order->save();
        session('order_message','Order has been canceled successfully!');
    }
    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.user.user-order-details-component',['order'=>$order])->layout('layouts.base');
    }
}
