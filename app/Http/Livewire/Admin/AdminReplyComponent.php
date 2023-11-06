<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\models\Contact;
use App\models\Reply;
class AdminReplyComponent extends Component
{
    public $message_id;
    public $reply_comment;

    public function mount($message_id)
    {
        $this->message_id=$message_id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'reply_comment'=>'required',
        ]);
    }
    public function sendReply()
    {
        $this->validate([
            'reply_comment'=>'required',
        ]);
        $contact = Contact::find($this->message_id);
        $reply = new Reply();
        $reply->message_id = $this->message_id;
        $reply->reply_comment = $this->reply_comment;
        $reply->email = $contact->email;
        $contact->reply_status = true;
        $contact->save();
        $reply->save();
        session()->flash('message','Reply has been sent successfully!');

    }
    public function render()
    {
        $contact = Contact::find($this->message_id);
        return view('livewire.admin.admin-reply-component',['contact'=>$contact])->layout('layouts.base');
    }
}
