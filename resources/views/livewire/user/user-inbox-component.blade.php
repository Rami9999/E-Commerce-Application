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
                        <div class="col-md-6">
                            <a href="{{route('user.dashboard')}}" class="btn btn-success pull-right">Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @foreach($replies as $reply)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>Support</td>
                                        <td>info@support.com</td>
                                        <td>{{$reply->reply_comment}}</td>
                                        <td>{{$reply->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$replies->links()}}
                

                </div>
            </div>
        </div>
    </div>
</div>
