<!DOCTYPE html>
<html lang="en" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Chirper' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen font-sans antialiased">
    <nav class="navbar bg-base-100 shadow-sm mb-8">
        <div class="flex-1">
            <a href="/" class="btn btn-ghost text-xl">Chirper</a>
        </div>
        <div class="flex-none gap-2">
            @auth
                <span class="font-bold">{{ auth()->user()->name }}</span>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-sm btn-outline">Log Out</button>
                </form>
            @else
                <a href="/login" class="btn btn-sm btn-ghost">Sign In</a>
                <a href="/register" class="btn btn-sm btn-primary">Sign Up</a>
            @endauth
        </div>
    </nav>
    
    @if(session('success'))
        <div class="toast toast-top toast-center z-50">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="max-w-2xl mx-auto p-4">
        {{ $slot }}
    </main>
</body>
</html>