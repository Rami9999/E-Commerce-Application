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
                            All Messages
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th class="text-center">Delete</th>
                                    <th class="text-center">Reply</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->comment}}</td>
                                        <td>{{$contact->created_at}}</td>
                                        <td>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this Message?') || event.stopImmediatePropagation()" wire:click.prevent="deleteMessage({{$contact->id}})" ><i style="margin-left:10px;" class="fa fa-times fa-2x text-danger"></i></a>

                                        </td>
                                        <td>
                                            @if($contact->reply_status==0)
                                                <a href="{{route('admin.replies',['message_id'=>$contact->id])}}" class="btn btn-info btnsm">Reply</i></a>
                                            @elseif ($contact->reply_status==1)
                                                <span style="color:red">Replied</span>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                

                </div>
            </div>
        </div>
    </div>
</div>
