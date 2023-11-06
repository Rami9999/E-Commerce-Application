<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use Auth;
use App\Models\Category;
class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    public  $min_price;
    public  $max_price;
    public function mount()
    {
        $this->sorting= "default";
        $this->pagesize=12;
        $this->min_price=1;
        $this->max_price=1000;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success','Item added to Cart');
        return redirect()->route('product.cart');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id === $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-count-component','refreshComponent');
                session()->flash('success_message','Item removed from your Wish List');
                return;
            }
        }
    }

    public function addtoWishList($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component','refreshComponent');

    }
    use WithPagination;
    public function render()

    {
        if($this->sorting=='date')
        {
            $products= Product::whereBetween('reqular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            $products= Product::whereBetween('reqular_price',[$this->min_price,$this->max_price])->orderBy('reqular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            $products= Product::whereBetween('reqular_price',[$this->min_price,$this->max_price])->orderBy('reqular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products= Product::whereBetween('reqular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        $categories= Category::all();
        return view('livewire.shop-component',['products'=>$products , 'categories'=>$categories])->layout('layouts.base');
    }
}
