<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product->image)
        {
            unlink('assets/images/products'.'/'.$product->image .'.jpg');
        }

        if($product->images)
        {
            $images = explode(',',$product->images);
            foreach($images as $image){
            if($image)
            {
                unlink('assets/images/products'.'/'.$image .'.jpg');
            }
        }
            
        }
        $product->delete();
        session()->flash('message','Product removed Successfully');
    }
    public function render()
    {
        $products= Product::paginate(5);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
