<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col items-center">
    <x-layout.navbar></x-layout.navbar>
    <div class="content flex justify-center bg-[#f1f1f1] w-[80%]">
        {{ $slot }}
    </div>
    <x-layout.footer></x-layout.footer>
</body>
</html>