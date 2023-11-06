<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\HomeSlider;
use LiveWire\WithFileUploads;
use Session;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status=0;
    }

    public function addSlider()
    {
        $slider = new HomeSlider;
        $slider->title = $this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $imageNameDB= Carbon::now()->timestamp;
        $imageName= $imageNameDB .'.jpg';
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageNameDB;
        $slider->status=$this->status;
        $slider->save();
        session()->flash('message','Slider Added Successfully');
    }
    
    
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
