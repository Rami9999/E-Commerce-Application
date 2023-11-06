<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider=HomeSlider::find($id);
        $slider->delete();
        session()->flash('message','Slider Removed Successfully');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
