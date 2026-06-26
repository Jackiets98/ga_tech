<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LCA Express Sdn. Bhd. — Sabah's trusted logistics partner. Fast, secure freight and delivery services across Malaysia.">
    <title>@yield('title', 'LCA Express — Sabah Logistics Company 物流公司')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Noto+Sans+SC:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800 bg-white">
    {{-- Top bar --}}
    <div class="top-bar hidden md:block bg-slate-900 text-slate-300 text-sm">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <a href="mailto:info@lcaexpress.com" class="hover:text-white transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    info@lcaexpress.com
                </a>
                <a href="tel:+60198933455" class="hover:text-white transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    +60 19-893 3455
                </a>
            </div>
            <div class="flex items-center gap-4">
                <span>Mon – Sat: 8:00 am – 5:00 pm</span>
                <a href="#" aria-label="Facebook" class="hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <header id="site-header" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 transition-shadow duration-300">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16 md:h-20">
                <a href="{{ url('/') }}#home" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center shadow-lg shadow-orange-500/25 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                    </div>
                    <div>
                        <span class="block font-bold text-slate-900 text-lg leading-tight">LCA Express</span>
                        <span class="block text-xs text-slate-500 font-chinese">物流公司</span>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-8" aria-label="Main navigation">
                    <a href="{{ url('/') }}#home" class="nav-link" data-section="home">Home</a>
                    <a href="{{ url('/') }}#about" class="nav-link" data-section="about">About</a>
                    <a href="{{ url('/') }}#services" class="nav-link" data-section="services">Service</a>
                    <a href="{{ route('blog.index') }}" class="nav-link" data-section="blog">Blog</a>
                    <a href="{{ url('/') }}#contact" class="nav-link" data-section="contact">Contact Us</a>
                </nav>

                <div class="hidden lg:flex items-center gap-3">
                    <a href="tel:+60198933455" class="btn-outline">Call Us</a>
                    <a href="{{ url('/') }}#contact" class="btn-primary">Get Quote</a>
                </div>

                <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors" aria-label="Toggle menu" aria-expanded="false">
                    <svg id="menu-icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="menu-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="lg:hidden hidden border-t border-slate-100 bg-white">
            <nav class="container mx-auto px-4 py-4 flex flex-col gap-1" aria-label="Mobile navigation">
                <a href="{{ url('/') }}#home" class="mobile-nav-link">Home</a>
                <a href="{{ url('/') }}#about" class="mobile-nav-link">About</a>
                <a href="{{ url('/') }}#services" class="mobile-nav-link">Service</a>
                <a href="{{ route('blog.index') }}" class="mobile-nav-link">Blog</a>
                <a href="{{ url('/') }}#contact" class="mobile-nav-link">Contact Us</a>
                <div class="pt-4 mt-2 border-t border-slate-100 flex flex-col gap-2">
                    <a href="tel:+60198933455" class="btn-outline text-center">+60 19-893 3455</a>
                    <a href="mailto:info@lcaexpress.com" class="btn-primary text-center">info@lcaexpress.com</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-slate-400">
        <div class="container mx-auto px-4 py-12 md:py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                        </div>
                        <div>
                            <span class="block font-bold text-white">LCA Express</span>
                            <span class="block text-xs font-chinese">Sabah Logistics company 物流公司</span>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed mb-4">We are a forward-thinking organization focused on delivering high-quality products and services that meet the evolving needs of our customers.</p>
                    <div class="flex gap-3">
                        <a href="#" aria-label="Instagram" class="social-icon"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        <a href="#" aria-label="Facebook" class="social-icon"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        <a href="#" aria-label="LinkedIn" class="social-icon"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
                        <a href="#" aria-label="X" class="social-icon"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/') }}#about" class="footer-link">About Us</a></li>
                        <li><a href="#" class="footer-link">Policy</a></li>
                        <li><a href="#" class="footer-link">Terms and Conditions</a></li>
                        <li><a href="#" class="footer-link">Career</a></li>
                        <li><a href="{{ route('blog.index') }}" class="footer-link">Blog</a></li>
                        <li><a href="{{ url('/') }}#contact" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Services</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="footer-link">Knowledge Base</a></li>
                        <li><a href="{{ url('/') }}#contact" class="footer-link">Contact Support</a></li>
                        <li><a href="#" class="footer-link">Privacy Policy</a></li>
                        <li><a href="{{ route('blog.index') }}" class="footer-link">Blog Articles</a></li>
                        <li><a href="#" class="footer-link">Brand Assets</a></li>
                        <li><a href="#" class="footer-link">Brand Guidelines</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-orange-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <a href="https://maps.app.goo.gl/YN5rEZHo91rFA5Nf6" target="_blank" rel="noopener" class="footer-link">Jalan Timur, 91000 Tawau, Sabah, Malaysia.</a>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-orange-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Monday – Saturday<br>8:00 a.m. – 5:00 p.m.</span>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-orange-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:info@lcaexpress.com" class="footer-link">info@lcaexpress.com</a>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-orange-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:+60198933455" class="footer-link">+60 19-893 3455</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm">
                <p>© LCA Express Sdn.Bhd. 2023–2025. All Rights Reserved. Co. No: 202301037402.</p>
                <p class="text-slate-500">Proudly powered By CHAN</p>
            </div>
        </div>
    </footer>

    <button id="back-to-top" class="back-to-top" aria-label="Back to top">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>
</body>
</html>
