<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- userposts投稿時の検索機能 -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
</head>

<body class="bg-slate-950 ">

     @include('layouts.navigation')
     
    <div class="min-h-screen">

        <!-- Page Heading -->
        @isset($header)
        <header class=" bg-slate-900 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        @if(session('success')) <div class="bg-green-600 text-white p-3 text-center"> {{ session('success') }} </div> @endif @if(session('error')) <div class="bg-red-600 text-white p-3 text-center"> {{ session('error') }} </div> @endif
        
        <!-- Page Content -->
        <main class="px-6 py-12">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    @stack('scripts')
</body>

</html>