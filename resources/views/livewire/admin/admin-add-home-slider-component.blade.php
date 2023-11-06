<div>
    <div class="container" style="padding : 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add new Slider
                            </div>
                            <div class="col-md-6">
                               <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All Sliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                        </div>
                    @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addSlider">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Slider Title</label>
                                <div class="col-md-4">
                                    <input type='text' class="form-control " placeholder="input Slider title" wire:model='title'/>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Slider Subtitle</label>
                                <div class="col-md-4">
                                    <input type='text' class="form-control " placeholder="input Slider subtitle" wire:model='subtitle'/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type='text' class="form-control " placeholder="input Slider Price" wire:model='price'/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type='text' class="form-control " placeholder="input Slider Link" wire:model='link'/>
                                </div>

                            </div>
                            

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type='file' class="input-file" wire:model='image' />
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" alt="no image" width="120">
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='status'>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="cpl-md-4">
                                    <button type="submit" class="btn btn-primary" style="margin-left:16px">Add</button>
                                </div>    
                            </div>
                        
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>