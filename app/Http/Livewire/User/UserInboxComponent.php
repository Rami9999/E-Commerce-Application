<?php

namespace App\Http\Livewire\User;
use Livewire\WithPagination;
use Livewire\Component;
use Auth;
use App\Models\Reply;
class UserInboxComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $replies = Reply::where('email',Auth::user()->email)->paginate(5);
        return view('livewire.user.user-inbox-component',['replies'=>$replies])->layout('layouts.base');
    }
}
