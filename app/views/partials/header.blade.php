<div role="navigation" class="navbar navbar-inverse ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#" class="navbar-brand">Welcome {{Session::get('user')->first_name}}</a>
        </div>
        <div class="navbar-collapse collapse" style="height: 1px;">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li><a href="{{URL::to('/profile')}}">Profile</a></li>
                <li><a href="{{URL::to('/logout')}}"><span class="glyphicon glyphicon-off"></span></a></li>
            </ul>
        </div>
    </div>
</div>


