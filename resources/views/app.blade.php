<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LdapRecord Browser</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles

    <!-- Alpine -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="antialiased min-h-screen bg-gray-100 dark:bg-gray-900 py-4 px-4">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center mb-4">
            <img src="https://ldaprecord.com/logo.svg" style="width:175px;min-width:175px;height:75px;">
        </div>

        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>