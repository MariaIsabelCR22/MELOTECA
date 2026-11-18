
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Meloteca</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0c0b10] text-[#e8e5ed] antialiased">

    <main class="min-h-screen flex flex-col items-center justify-center px-5 py-10">

        <a href="{{ route('login') }}"
           class="text-xl font-bold tracking-[0.18em] text-white mb-7 hover:text-purple-300 transition">
            MELOTECA
        </a>

        <div class="w-full max-w-md bg-[#14121a] border border-gray-800 rounded-2xl p-6 sm:p-8 shadow-xl shadow-black/20">

            {{ $slot }}

        </div>

        <p class="mt-7 text-xs text-gray-600">
            Tu colección, tu música.
        </p>

    </main>

</body>
</html>
