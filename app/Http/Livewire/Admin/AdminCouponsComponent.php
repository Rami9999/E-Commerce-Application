<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coupon;
class AdminCouponsComponent extends Component
{
    use WithPagination;
    public function deleteCoupon($coupun_id)
    {
        $coupon = Coupon::find($coupun_id);
        $coupon->delete();
        session()->flash('message','Coupon deleted Successfully');
    }
    public function render()
    {
        $coupons = Coupon::paginate(5);
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
