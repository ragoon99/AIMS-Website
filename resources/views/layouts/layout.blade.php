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

    <header>
        <img src="A.png" height="50" width="50">

        <p>
            Agriculture Information Management System
        </p>
        <nav>
            <a href="">Home</a>
            <a href="">Data</a>
            <a href="">Knowledge Base</a>
            <a href="">About</a>
            <a href="">Contact Us</a>
        </nav>

        <div class="dropdown">
            <a href="#" class="iconDropdown">
                <img src="uIcon.png" alt="User Icon">
            </a>
            <div class="dropdown-content">
                <a href="#">Profile Settings</a>
                <a href="#">Help</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </header>
</head>
<body>

    @yield('content')

</body>

<footer>
    <p>
        Copyright &copy 2021 - 2022
    </p>

    <div>
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
    </div>

    <div>
        <a href=""></a>
        <a href=""></a>
    </div>
</footer>
</html>
