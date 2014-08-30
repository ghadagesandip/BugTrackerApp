<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{$title}}</title>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/jquery-ui-1.10.0.custom.css') }}

</head>
<body>
    @include('partials.header')
    <div class="container-fluid">
    @yield('content')
    </div>
    @include('partials.footer')

        {{HTML::script('js/jquery.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/functionscript.js') }}
        {{ HTML::script('js/jquery-ui-1.9.2.custom.min.js')}}

</body>
</html>