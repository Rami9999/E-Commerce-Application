<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;
class AdminContactComponent extends Component
{
    use WithPagination;

    public function deleteMessage($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        session('message','Message Removed Successfully!');
    }
    public function render()
    {
        $contacts = Contact::paginate(5);
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.base');
    }
}
