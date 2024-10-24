
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Acceso Restringido - Error 403') }}</title>

    <link rel="icon" href="{{ asset('img/favicon.jpg') }}" type="image/jpg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css">

    <!-- FontAwesome-->
    <script src="https://kit.fontawesome.com/12b516948a.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-md overflow-hidden px-5 py-3">
        <h1 class="text-3xl font-bold text-center text-red-600">Acceso Restringido</h1>
        <p class="mt-4 text-gray-600 text-center">No tienes permisos para acceder a esta página.</p>
        <div class="mt-6 flex justify-center">
            <a href="{{ route('inicio') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">Ir a Inicio</a>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')

</body>

</html>
