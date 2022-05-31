<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>

    <header>
        <a href="{{ route('seed.index') }}">Seed Data</a>
        <a href="{{ route('livestock.index') }}">Livestock Data</a>
        <a href="{{ route('weather.index') }}">Weather Data</a>
        <a href="{{ route('equipment.index') }}">Equipment Data</a>
        <a href="{{ route('crop.index') }}">Crops Data</a>
        <a href="">Farmer Data</a>
        <a href="empData">Employee Data</a>
    </header>
</head>
<body>

    @yield('content')

    <div>
        <br>
        <a href="adminDash">Return To Dashboard</a>
    </div>
</body>
</html>
