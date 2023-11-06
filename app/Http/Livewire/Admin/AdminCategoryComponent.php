<?php

namespace App\Http\Livewire\Admin;
use Rap2hpoutre\FastExcel\FastExcel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Str;
class AdminCategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public function deleteCategory($id)
    {
        $category= Category::find($id);
        $category->delete();
        session()->flash('message','Category removed Successflly');
    }

    public function deleteSubCategory($id)
    {
        $scategory= SubCategory::find($id);
        $scategory->delete();
        session()->flash('message','SubCategory removed Successflly');
    }

    public function render()
    {
        $categories= Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
