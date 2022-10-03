<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @routes
    @vite('resources/js/app.js')
    @inertiaHead

    <script>
        window.User = {
            id: {{ optional(auth()->user())->id ? auth()->user()->id : 1 }},
            avatar: '{{optional(auth()->user())->avatar() }}',
        }
    </script>
</head>
<body class="font-sans antialiased">
@inertia
</body>
</html>
