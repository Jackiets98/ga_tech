<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — LCA Express</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-lca-yellow-soft/30 text-lca-gray-900 min-h-screen">
    @auth
    <header class="bg-lca-gray-900 text-white">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.blogs.index') }}" class="font-bold text-lca-yellow">LCA Admin</a>
                <a href="{{ route('blog.index') }}" target="_blank" class="text-sm text-lca-gray-300 hover:text-white transition-colors">View Site ↗</a>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="text-sm text-lca-gray-300 hover:text-white transition-colors">Log out</button>
            </form>
        </div>
    </header>
    @endauth

    <main class="container mx-auto px-4 py-8 max-w-5xl">
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-emerald-100 text-emerald-800 border border-emerald-200 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 px-4 py-3 rounded-xl bg-red-100 text-red-800 border border-red-200 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
