<?php

namespace App\Http\Livewire\User;
use App\Models\review;
use Livewire\Component;
use App\Models\OrderItem;
class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id =$order_item_id;
        
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'rating'=>'required',
            'comment'=>'required'
    ]);
    }
    public function addReview()
    {
        $this->validate([
            'rating'=>'required',
            'comment'=>'required'
        ]);
        $rev = new review;
        $rev->rating = $this->rating;
        $rev->comment=$this->comment;
        $rev->order_item_id=$this->order_item_id;
        $rev->save();
        $order_item =OrderItem::find($this->order_item_id);
        $order_item->review_status = true;
        $order_item->save();
        session()->flash('review','Your Review has been submitted successfully!');
    }
    public function render()
    {
        $order_item =OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component',['order_item'=>$order_item])->layout('layouts.base');
    }
}
