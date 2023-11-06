<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\HomeSlider;
use LiveWire\WithFileUploads;
use Session;
class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $slider_id;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $imageDB;

    public function mount($slider_id)
    {
        $this->slider_id=$slider_id;
        $slider=HomeSlider::find($this->slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price=$slider->price;
        $this->link=$slider->link;
        $this->imageDB=$slider->image;
        $this->status=$slider->status;
    }

    public function updateSlider()
    {
        $slider=HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $imageName= $this->imageDB .'.jpg';
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $this->imageDB;
        $slider->status=$this->status;
        $slider->save();
        session()->flash('message','Slider Updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
