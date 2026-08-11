<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ØĐLibrary</title>
    <!-- <link rel="icon" href="{{ asset('storage/app/public/logo.png') }}" type="image/x-icon"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        {{ $slot }}
    </div>
</body>
</html>