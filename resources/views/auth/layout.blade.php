<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Elysium</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

<div class="wrapper" style="background-image: url('{{ asset('images/auth/a.jpg') }}');">
    <div class="inner">
        <div class="image-holder">
            <img src="{{ asset('images/auth/b.jpg') }}" alt="">
        </div>
        @yield('content')
    </div>
</div>

</body>
</html>
