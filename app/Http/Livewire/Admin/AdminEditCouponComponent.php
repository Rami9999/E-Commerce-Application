<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
class AdminEditCouponComponent extends Component
{
    public $code;
    public $coupon_id;
    public $type;
    public $value;
    public $cart_value;

    public function mount($coupon_id)
    {
        $this->coupon_id=$coupon_id;
        $coupon  = Coupon::find($this->coupon_id);
        $this->type = $coupon->type;
        $this->code = $coupon->code;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[

            'code'=>'required',
            'type'=>'required',
            'value'=>'required',
            'cart_value'=>'required',
        ]);
    }
    public function updateCoupon(){
        $this->validate([

            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
        ]);
        $coupon  = Coupon::find($this->coupon_id);
        $coupon->code= $this->code;
        $coupon->value= $this->value;
        $coupon->cart_value= $this->cart_value;
        $coupon->type= $this->type;
        $coupon->save();
        session()->flash('message','Coupon Updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.base');;
    }
}
