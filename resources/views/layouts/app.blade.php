<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="https://www.afocatregioncentro.pe/power/wp-content/uploads/favin.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Consulta Afocat</title>

    <!-- Fonts --> 
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }
        img {
            width: 85px;
            height: 85px;
        }
        .header {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        }

        .logo {
        width: 320px;
        height: 100%;
        }

        .contenedor {
        background-color: #061943;
        border-radius: 10px;
        }

        .submit {
        background-color: #00906f;
        border-radius: 2px;
        }

        label {
        color: #a0aec0;
        margin-left: 12px;
        margin-top: 12px;
        margin-bottom: auto;
        }

        input {
        border: 1px solid #8397bc;
        padding: 5px;
        color: #8397bc;
        background-color: transparent;
        border-radius: 2px;
        }

        .nosubmit {
        background-color: transparent;
        border: 1px solid #00906f;
        color : #00906f;
        font-weight: bold;
        border-radius: 2px;
        }

        .inputstatic {
            background-color: #8296b5;
            color: #061943;
            font-weight: bold;
        }
        select {
        border: 1px solid #8397bc;
        padding: 5px;
        color: #8397bc;
        background-color: transparent;
        border-radius: 2px;
        }
        select option {
        background-color: #fff; 
        color: #333; 
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        }

        .carita{
        display: flex; 
        align-items: center; 
        justify-content: center;
        }
        span img{
        width: 30px;
        margin-right: 5px;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
