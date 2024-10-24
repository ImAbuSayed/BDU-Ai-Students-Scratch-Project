<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI-Enhanced Todo List</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold">Projects</h1>

        <div class="container mx-auto py-12">
            <div x-data="{ open: false }" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-xl">
                <!-- Clickable header -->
                <h2 @click="open = !open" class="text-3xl font-bold mb-6 text-center text-gray-800 cursor-pointer">
                    AI-Enhanced Todo List (Demo)
                </h2>
                <!-- Collapsible content -->
                <div x-show="open" x-transition>
                    <livewire:ai-to-do-list />
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
