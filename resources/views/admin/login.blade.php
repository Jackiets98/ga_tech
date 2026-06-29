@extends('layouts.admin')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto mt-12">
    <div class="bg-white rounded-2xl shadow-lg border border-lca-gray-200 p-8">
        <div class="text-center mb-8">
            <img src="{{ asset('images/lca-logo.png') }}" alt="LCA Express" class="h-14 mx-auto mb-4 object-contain">
            <h1 class="text-xl font-bold text-lca-gray-950">Admin Login</h1>
            <p class="text-sm text-lca-gray-600 mt-1">Sign in to manage blog posts</p>
        </div>

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="admin-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="admin-input" required autofocus>
            </div>
            <div>
                <label for="password" class="admin-label">Password</label>
                <input type="password" id="password" name="password" class="admin-input" required>
            </div>
            <label class="flex items-center gap-2 text-sm text-lca-gray-700">
                <input type="checkbox" name="remember" class="rounded border-lca-gray-300 text-lca-gray-900">
                Remember me
            </label>
            <button type="submit" class="btn-primary w-full">Sign In</button>
        </form>
    </div>
</div>
@endsection
