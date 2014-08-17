@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}">Home</a></li>
            <li><a href="{{URL::to('bug-types')}}">Bug Types</a></li>
            <li>View bug Type</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <dl class="dl-horizontal">
            <dt>Id</dt>
            <dd>{{$bugtype->id}}</dd>

            <dt>Name</dt>
            <dd>{{$bugtype->name}}</dd>
        </dl>
        <div class="row">
            <div class="col-sm-offset-1">
                <a class="btn btn-default" href="{{URL::to('bug-types')}}">Back</a>
            </div>
        </div>

    </div>
</div>
@stop