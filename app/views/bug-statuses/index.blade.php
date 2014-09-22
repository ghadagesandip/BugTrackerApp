@section('content')

    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('dashboard')}}">Home</a></li>
                <li>Bug Status</li>
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <h1>Bug Statuses <a class="btn btn-success" href="{{URL::to('bug-statuses/create')}}"><i class="glyphicon glyphicon-plus"></i>Add New</a></h1>
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bugstatuses as $bugstatus)
                    <tr>
                        <td>{{$bugstatus->id}}</td>
                        <td>{{$bugstatus->name}}</td>
                        <td>{{$bugstatus->created_at}}</td>
                        <td>{{$bugstatus->updated_at}}</td>
                        <td>
                            <a class="btn btn-info" href="{{URL::to('bug-statuses/'.$bugstatus->id)}}">View</a>
                            <a class="btn btn-primary" href="{{URL::to('bug-statuses/'.$bugstatus->id.'/edit')}}"> Edit</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop