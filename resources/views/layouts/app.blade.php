{{-- Master layout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css') {{-- Inject tailwind css --}}
</head>

<body class="bg-gray-100 font-sans text-justify flex flex-col h-screen justify-between">

    @yield('main')

    <!-- Include your additional scripts here -->
</body>

</html>
