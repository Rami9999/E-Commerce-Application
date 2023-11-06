<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $reqular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $images;
    public $scategory_id;
    public function mount()
    {
        $this->stock_status = 'inStock';
        $this->quantity=0;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[

            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_description'=>'required',
            'description'=>'required',
            'reqular_price'=>'required',
            'SKU'=>'required|unique:products',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
    }
    public function addProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_description'=>'required',
            'description'=>'required',
            'reqular_price'=>'required',
            'SKU'=>'required|unique:products',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        $product = new Product;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->reqular_price = $this->reqular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_state = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageNameDB= Carbon::now()->timestamp;
        $imageName= $imageNameDB .'.jpg';
        $this->image->storeAs('products',$imageName);
        $product->image = $imageNameDB;
        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgNameDB= Carbon::now()->timestamp .$key;
                $imgName= $imgNameDB .'.jpg';
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname .$imgNameDB.',';
            }
            $product->images=$imagesname;
        }
        $product->category_id = $this->category_id;
        if($this->scategory_id)
        {
            $product->subcategory_id =$this->scategory_id;
        }
        $product->save();
        session()->flash('message','Product Added Successfully');
    }

    public function changeSubcategory()
    {
        $this->scategory_id=0;
    }
    public function render()
    {
        
        $categories = Category::all();
        $scategories = SubCategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.base');
    }
}
