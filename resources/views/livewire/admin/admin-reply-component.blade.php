
<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="row">
                    <div class="col-md-6">
                            Reply
                        
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.contact')}}" class="btn btn-success pull-right">Back to messages</a>
                        </div>
                    </div>
                        
                    </div>
                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    @if($contact->reply_status==0)
                        <form class="form-horizontal" wire:submit.prevent="sendReply">
                            <div style="margin-left:227px;">
                                    <div class="form-group" style="margin-right:100px;">
                                        <label class="col-md-4 control-label">From: <b>{{$contact->email}}</b> </label>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Message: <b>{{$contact->comment}}</b></label>
                                    </div>
                            </div>
                            
                            
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Reply</label>
                                    <div class="col-md-4">
                                    <textarea class="form-control " placeholder="Write Here!" wire:model='reply_comment'></textarea>
                                        @error('reply_comment') <p class='text-danger'>{{$message}}</p> @enderror
                                    </div>

                                </div>
                            
                    
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Reply</button>
                                </div>

                            </div>
                        </form>
                    @else
                    <div class="container pb-60">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Reply has been sent</h2>
                                <p>Now the user can read it in his inbox</p>
                                <a href="{{route('admin.dashboard')}}" class="btn btn-submit btn-submitx">Dashboard</a>
                            </div>
                        </div>
                    </div>                    
                    @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
