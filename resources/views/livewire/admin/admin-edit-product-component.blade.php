<div>
    <div class="container" style="padding : 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div class="col-md-6">
                               <a href="{{route('admin.product')}}" class="btn btn-success pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                        </div>
                    @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="input Prodcut Name" class="form-control input-md" wire:model='name' wire:keyup="generateslug"/>
                                    @error('name') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="input Prodcut Slug" class="form-control input-md" wire:model='slug'/>
                                    @error('slug') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control " placeholder="input Prodcut Short Description" wire:model='short_description'></textarea>
                                    @error('short_description') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control " placeholder="input Prodcut Description" wire:model='description'></textarea>
                                    @error('description') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="input Prodcut Regular Price" class="form-control input-md" wire:model='reqular_price'/>
                                    @error('reqular_price') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="input Prodcut Sale Price" class="form-control input-md" wire:model='sale_price'/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="input Prodcut SKU" class="form-control input-md" wire:model='SKU'/>
                                    @error('SKU') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='stock_state'>
                                        <option value="inStock">inStock</option>
                                        <option value="outOfStock">outOfStock</option>
                                    </select>
                                    @error('stock_status') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" >Featured</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='featured'>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured') <p class='text-danger'>{{$message}}</p> @enderror
                            </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="input Prodcut Quantity" class="form-control input-md" wire:model='quantity'/>
                                    @error('quantity') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='category_id' wire:change="changeSubcategory">
                                    <option value="0">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('category_id') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sub Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='scategory_id'>
                                    <option value="0">Select SubCategory</option>
                                    @foreach($scategories as $scategory)
                                        <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('scategory_id') <p class='text-danger'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="cpl-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>    
                            </div>
                        
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
