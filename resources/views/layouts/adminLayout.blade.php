<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @yield('title')
    </title>

    <link rel="icon" href="{{ asset("images/Logo.png") }}" type="image/icon type">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css") }}" rel="stylesheet">

	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
	<link href="{{ asset("css/style.css") }}" rel="stylesheet">
	<link href="{{ asset("css/util.css") }}" rel="stylesheet">

    @yield('head')

</head>
<body>

    @yield('content')


    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
</body>

<footer>

    @yield('footer')

</footer>
</html>
