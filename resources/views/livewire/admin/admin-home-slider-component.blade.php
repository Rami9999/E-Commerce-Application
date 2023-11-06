<div>
    <div class="container" style="padding:30px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add New Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slide)
                                    <tr>
                                        <td>{{$slide->id}}</td>
                                        <td><img src="{{asset('assets/images/sliders')}}/{{$slide->image}}.jpg" width="120" alt="{{$slide->title}}"/></td>
                                        <td>{{$slide->title}}</td>
                                        <td>{{$slide->subtitle}}</td>
                                        <td>{{$slide->price}}</td>
                                        <td>{{$slide->link}}</td>
                                        <td>{{$slide->status ==1 ? 'Active':'Inactive'}}</td>
                                        <td>{{$slide->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.edithomeslider',['slider_id'=>$slide->id])}} " ><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this Slide?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlider({{$slide->id}})" ><i style="margin-left:10px;" class="fa fa-times fa-2x text-danger"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
