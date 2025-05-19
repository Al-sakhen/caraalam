<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/front/style.css', 'resources/front/app.js'])
</head>

<body class="font-sans antialiased" dir="rtl">

    @include('frontend.layout.navbar')

    @yield('content')

    <x-mary-toast />
</body>

</html>
