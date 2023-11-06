<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;
class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $facebook;
    public $twiter;
    public $youtube;
    public $pinterest;
    public $instagram;

    public function mount()
    {
        $setting = Setting::find(1);
        if($setting)
        {
            $this->email=$setting->email;
            $this->phone=$setting->phone;
            $this->phone2=$setting->phone2;
            $this->address=$setting->address;
            $this->map=$setting->map;
            $this->facebook=$setting->facebook;
            $this->twiter=$setting->twiter;
            $this->youtube=$setting->youtube;
            $this->pinterest=$setting->pinterest;
            $this->instagram=$setting->instagram;


        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
             'email'=>'required|email',
             'phone'=>'required',
             'phone2'=>'required',
             'address'=>'required',
             'map'=>'required',
             'facebook'=>'required',
             'twiter'=>'required',
             'youtube'=>'required',
             'pinterest'=>'required',
             'instagram'=>'required'
        ]);
    }
    public function saveSettings()
    {
        $this->validate([
             'email'=>'required|email',
             'phone'=>'required',
             'phone2'=>'required',
             'address'=>'required',
             'map'=>'required',
             'facebook'=>'required',
             'twiter'=>'required',
             'youtube'=>'required',
             'pinterest'=>'required',
             'instagram'=>'required'
        ]);
        $setting = Setting::find(1);
        if(!$setting)
        {
            $setting = new Setting();
        }
        $setting->email=$this->email;
        $setting->phone=$this->phone;
        $setting->phone2=$this->phone2;
        $setting->address=$this->address;
        $setting->map=$this->map;
        $setting->facebook=$this->facebook;
        $setting->youtube=$this->youtube;
        $setting->pinterest=$this->pinterest;
        $setting->instagram=$this->instagram;
        $setting->twiter=$this->twiter;
        $setting->save();
        session()->flash('message','settings has been updated Successfully!');

    
    }
    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
