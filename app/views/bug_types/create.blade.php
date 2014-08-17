@section('content')
 <div class="row">
     <div class="col-sm-12">
         <ul class="breadcrumb">
             <li><a href="{{URL::to('dashboard')}}">Home</a></li>
             <li><a href="{{URL::to('bug-types')}}">Bug Types</a></li>
             <li>Add new Bug Type</li>
         </ul>
     </div>
 </div>
@stop