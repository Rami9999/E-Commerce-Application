<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Products
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Add Product</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Stock_Status</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><figure><img src="{{asset('assets/images/products')}}/{{$product->image}}.jpg" alt="{{$product->name}}" width="60"></figure></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>$ {{$product->reqular_price}}</td>
                                        <td>$ {{$product->sale_price? $product->sale_price:0}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.editproduct',['id'=>$product->id])}}" ><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this Product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})" ><i style="margin-left:10px;" class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>