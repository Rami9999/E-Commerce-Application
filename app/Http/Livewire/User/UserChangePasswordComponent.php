<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserChangePasswordComponent extends Component
{
    public $currentPassword;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'currentPassword'=>'required',
            'password'=>'required|min:8|confirmed|different:currentPassword',
            
        ]);
    }
    public function changePassword()
    {
        $this->validate([
            'currentPassword'=>'required',
            'password'=>'required|min:8|confirmed|different:currentPassword',
            
        ]);
        if(Hash::check($this->currentPassword,Auth::user()->password))
        {
            $user= User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success','Password has been successfully changed');
            
        }
        else
        {
            session()->flash('password_fail','Password does not match, try again!');
        }
    }
    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
