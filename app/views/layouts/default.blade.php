<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{$title}}</title>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}
    <!-- bootstrap.css style.css -->
</head>
<body>
    @include('partials.header')
    <div class="container-fluid">
    @yield('content')
    </div>
    @include('partials.footer')

    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/functionscript.js') }}

    <!--   bootstrap.js bootstrap.min.js functionscript.js jquery.min.js -->

</body>
</html>