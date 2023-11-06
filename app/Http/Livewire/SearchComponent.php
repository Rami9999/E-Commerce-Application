<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;
class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cat;
    public $product_cat_id;
    public  $min_price;
    public  $max_price;
    public function mount()
    {
        $this->sorting= "default";
        $this->pagesize=12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
        $this->min_price=1;
        $this->max_price=1000;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success','Item added to Cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()

    {
        if($this->sorting=='date')
        {
            $products= Product::where('name','like','%' . $this->search . '%')->where('category_id','like','%' .$this->product_cat_id .'%')->whereBetween('reqular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            $products= Product::where('name','like','%' . $this->search . '%')->where('category_id','like','%' .$this->product_cat_id .'%')->whereBetween('reqular_price',[$this->min_price,$this->max_price])->orderBy('reqular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            $products= Product::where('name','like','%' . $this->search . '%')->where('category_id','like','%' .$this->product_cat_id .'%')->whereBetween('reqular_price',[$this->min_price,$this->max_price])->orderBy('reqular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products= Product::where('name','like','%' . $this->search . '%')->where('category_id','like','%' .$this->product_cat_id .'%')->whereBetween('reqular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }
        $categories= Category::all();
        return view('livewire.search-component',['products'=>$products , 'categories'=>$categories])->layout('layouts.base');
    }
}