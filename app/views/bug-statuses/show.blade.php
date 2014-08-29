@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('bug-status')}}">Bug Status</a></li>
            <li>View Bug Status</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <dl class="dl-horizontal">
            <dt>ID</dt>
            <dd>{{$bugStatus->id}}</dd>

            <dt>Name</dt>
            <dd>{{$bugStatus->name}}</dd>

            <dt>Description</dt>
            <dd>{{$bugStatus->description}}</dd>

            <dt>Created</dt>
            <dd>{{$bugStatus->created_at}}</dd>

            <dt>Modified</dt>
            <dd>{{$bugStatus->updated_at}}</dd>

        </dl>
    </div>
</div>
@stop