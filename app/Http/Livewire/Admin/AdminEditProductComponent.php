<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $reqular_price;
    public $sale_price;
    public $SKU;
    public $stock_state;
    public $featured;
    public $quantity;
    public $category_id;
    public $scategory_id;

    public function mount($id)
    {
        $this->product_id=$id;
        $product= Product::find($this->product_id);
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->short_description=$product->short_description;
        $this->description=$product->description;
        $this->reqular_price=$product->reqular_price;
        $this->sale_price=$product->sale_price;
        $this->SKU=$product->SKU;
        $this->stock_state = $product->stock_state;
        $this->quantity=$product->quantity;
        $this->category_id=$product->category_id;
        $this->scategory_id=$product->subcategory_id;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[

            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'reqular_price'=>'required',
            'SKU'=>'required',
            'stock_state'=>'required',
            'featured'=>'required',
            'quantity'=>'required',

            'category_id'=>'required'
        ]);
    }
    public function updateProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'reqular_price'=>'required',
            'SKU'=>'required',
            'stock_state'=>'required',
            'featured'=>'required',
            'quantity'=>'required',
            'category_id'=>'required'
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->reqular_price = $this->reqular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_state = $this->stock_state;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        /*if($this->image){
            unlink('assets/images/products'.'/'.$product->image .'.jpg');
            $name =  Carbon::now()->timestamp;
            $imageName= $name .'.jpg';
            $this->image->storeAs('products',$imageName);
            $product->image = $name;
        }
        if($this->newimages)
        {
            if($product->images){
                $images = explode(',',$product->images);
                foreach($images as $image){
                if($image)
                {
                    unlink('assets/images/products'.'/'.$image .'.jpg');
                }
            }
            $newImagesName="";
            foreach($this->newimages as $kew=>$image)
            {
                $newimgNameDB= Carbon::now()->timestamp .$key;
                $newimgName= $newimgNameDB .'.jpg';
                $image->storeAs('products',$newimgName);
                $newImagesName = $newImagesName .$newimgNameDB.',';
                
            }
            $product->images = $newImagesName;
        }*/
        if($this->scategory_id)
        {
            $product->subcategory_id = $this->scategory_id;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Product Updated Successfully');
    }

    public function changeSubcategory()
    {
        $this->scategory_id=0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = SubCategory::where('category_id',$this->category_id)->get(); 
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.base');
    }
}
