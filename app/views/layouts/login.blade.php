<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{$title}}
    </title>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/login.css') }}

</head>
<body>
@include('partials.login_header')

    <div class="container-fluid">
        @yield('content')
    </div>


@include('partials.login_footer')


{{ HTML::script('js/jquery.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>