<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-layout.navbar></x-layout.navbar>
    <div class="container">
        {{ $slot }}
    </div>
</body>
</html>