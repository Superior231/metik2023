<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.style')
    @stack('style')
    <title>METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>

    @yield('content')

    @include('components.script')
    @stack('script')
    
</body>

</html>