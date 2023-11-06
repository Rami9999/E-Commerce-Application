<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Auth;
class UserOrdersComponent extends Component
{
    public function render()
    {
        $user_id=Auth::user()->id;
        $orders = Order::where('user_id',$user_id)->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.user.user-orders-component',['orders'=>$orders])->layout('layouts.base');
    }
}
