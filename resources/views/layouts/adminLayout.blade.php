<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ url('css/site.css') }}">

    @yield('head')
</head>
<body>

    @yield('content')

</body>

<footer>

    @yield('footer')

</footer>
</html>
