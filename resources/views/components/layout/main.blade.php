<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.css'])
</head>
<body class="d-flex flex-column min-vh-100">
    <header>

    </header>
        <x-navbar />
    <main>
        {{$slot}}
    </main>

    <footer class="mt-auto bg-secondary">
        <x-footer />
    </footer>

</body>
</html>