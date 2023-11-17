<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans text-justify flex flex-col h-screen justify-between">

    @include('partials.header')

    <div id="wrapper" class="flex mb-auto max-w-screen-lg">
        @include('partials.sidebar')

        <div id="content-wrapper" class="w-full p-4">
            @yield('content')
        </div>

    </div>

    @include('partials.footer')

    <!-- Include your additional scripts here -->
</body>

</html>