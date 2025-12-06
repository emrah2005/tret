{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Influentia')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    @include('layouts.navigation')

    <main class="max-w-5xl mx-auto px-4 py-10">
        @yield('content')
    </main>

</body>
</html>
