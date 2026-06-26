@extends('layouts.lca')

@section('content')
{{-- Hero --}}
<section id="home" class="hero-section relative overflow-hidden">
    <div class="hero-bg absolute inset-0"></div>
    <div id="hero-canvas" class="hero-canvas absolute inset-0" aria-hidden="true"></div>
    <div class="hero-pattern absolute inset-0 opacity-30"></div>
    <div class="container mx-auto px-4 relative z-10 py-20 md:py-32 lg:py-40">
        <div class="max-w-3xl">
            <span class="reveal inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-orange-300 text-sm font-medium mb-6">
                <span class="w-2 h-2 rounded-full bg-orange-400 animate-pulse"></span>
                Sabah Logistics company 物流公司
            </span>
            <h1 class="reveal reveal-delay-1 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                Fastest &amp; Secured Logistics
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300"> Solution &amp; Services</span>
            </h1>
            <p class="reveal reveal-delay-2 text-lg md:text-xl text-slate-300 max-w-xl mb-8 leading-relaxed">
                These professional, trustworthy, and aligned with your brand.
            </p>
            <div class="reveal reveal-delay-3 flex flex-col sm:flex-row gap-4">
                <a href="#about" class="btn-primary-lg">Learn More</a>
                <a href="#contact" class="btn-ghost-lg">Get a Quote</a>
            </div>
        </div>

        <div class="mt-16 md:mt-20 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl">
            <div class="stat-card reveal">
                <span class="stat-number" data-target="2023">0</span>
                <span class="stat-label">Est. Year</span>
            </div>
            <div class="stat-card reveal reveal-delay-1">
                <span class="stat-number" data-target="10">0</span>
                <span class="stat-suffix">+</span>
                <span class="stat-label">Ton Fleet</span>
            </div>
            <div class="stat-card reveal reveal-delay-2">
                <span class="stat-number" data-target="100">0</span>
                <span class="stat-suffix">%</span>
                <span class="stat-label">Secure Delivery</span>
            </div>
            <div class="stat-card reveal reveal-delay-3">
                <span class="stat-number" data-target="24">0</span>
                <span class="stat-suffix">/7</span>
                <span class="stat-label">Support</span>
            </div>
        </div>
    </div>
    <div class="hero-wave">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- Services --}}
<section id="services" class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12 md:mb-16">
            <span class="section-tag reveal">Our Places</span>
            <h2 class="reveal reveal-delay-1 text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">Service We Provide</h2>
            <p class="reveal reveal-delay-2 text-slate-600">Comprehensive logistics solutions tailored for businesses across Sabah and beyond.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @foreach([
                ['icon' => 'ship', 'title' => 'Ocean Freight', 'desc' => 'Full-container and LCL shipping from Tawau Port to Port Klang, Johor, and international destinations. We handle customs clearance, bill of lading, and cargo insurance so your goods cross the South China Sea safely and on schedule.'],
                ['icon' => 'truck', 'title' => 'Road Freight', 'desc' => 'Reliable overland delivery across Sabah — Tawau, Sandakan, Lahad Datu, Semporna, and beyond. Our GPS-tracked fleet supports same-day local dispatch, RoRo ferry connections via Labuan, and scheduled routes for bulk and palletised cargo.'],
                ['icon' => 'warehouse', 'title' => 'Warehousing', 'desc' => 'Secure storage and inventory management at our Jalan Timur hub in Tawau. Climate-controlled units for sensitive goods, pick-and-pack for e-commerce orders, and flexible short- or long-term leasing for businesses scaling across East Malaysia.'],
            ] as $i => $service)
            <article class="service-card reveal reveal-delay-{{ $i + 1 }}">
                <div class="service-icon">
                    @if($service['icon'] === 'ship')
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                    @elseif($service['icon'] === 'truck')
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                    @else
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $service['title'] }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-5">{{ $service['desc'] }}</p>
                <a href="#contact" class="inline-flex items-center gap-2 text-orange-600 font-semibold text-sm hover:gap-3 transition-all">
                    Learn More
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- About --}}
<section id="about" class="py-16 md:py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <span class="section-tag reveal">Our Company</span>
                <h2 class="reveal reveal-delay-1 text-3xl md:text-4xl font-bold text-slate-900 mb-6">
                    Sabah Logistics company
                    <span class="font-chinese text-orange-600">物流公司</span>
                </h2>
                <p class="reveal reveal-delay-2 text-slate-600 leading-relaxed mb-6">
                    We are a forward-thinking organization focused on delivering high-quality products and services that meet the evolving needs of our customers. Our mission is to innovate, grow sustainably, and create value for all stakeholders through teamwork, integrity, and excellence.
                </p>
                <p class="reveal reveal-delay-3 text-slate-600 leading-relaxed mb-8">
                    LCA Express Sdn. Bhd., our journey began with a simple yet ambitious vision: to revolutionize the way goods move across the world. Established in 2023, our company started as a small operation with 10 tons truk and a commitment to delivering excellence. Over the years, we've grown into a trusted name in logistics, driven by innovation, reliability, and a passion for connecting businesses with their customers.
                </p>
                <a href="#contact" class="reveal reveal-delay-4 btn-primary">Contact Us Today</a>
            </div>

            <div class="space-y-4">
                <div class="vision-card reveal">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-2">Vision Statement</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">"To be the most trusted and innovative logistics partner in Malaysia and beyond — delivering speed, reliability, and excellence in every parcel we move."</p>
                            <p class="text-slate-500 text-sm mt-2 font-chinese">"成为马来西亚乃至全球最值得信赖、最具创新精神的物流合作伙伴——确保我们运输的每一件包裹都快速、可靠、卓越。"</p>
                        </div>
                    </div>
                </div>

                <div class="vision-card reveal reveal-delay-1">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-2">Mission Statement</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">"To deliver fast, secure, and reliable logistics solutions by leveraging smart technology, empowering our people, and exceeding customer expectations — every step of the way."</p>
                            <p class="text-slate-500 text-sm mt-2 font-chinese">"通过利用智能技术、赋能员工、超越客户期望，提供快速、安全、可靠的物流解决方案——全程确保客户满意。"</p>
                        </div>
                    </div>
                </div>

                <div class="vision-card reveal reveal-delay-2">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-2">Our Growth</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Today, we are proud to offer supply chain management, warehousing, and last-mile delivery, backed by cutting-edge technology and a commitment to sustainability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Blog --}}
<section id="blog" class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="section-tag reveal">Latest News</span>
            <h2 class="reveal reveal-delay-1 text-3xl md:text-4xl font-bold text-slate-900 mb-4">Blog</h2>
            <p class="reveal reveal-delay-2 text-slate-600">Real-time updates on shipping, operations, and company news from Tawau, Sabah.</p>
        </div>

        @include('partials.blog-list', ['blogs' => $blogs])

        @if($blogs->count() > 3)
        <div class="text-center mt-10 reveal">
            <a href="{{ route('blog.index') }}" class="btn-outline">View All Articles</a>
        </div>
        @endif
    </div>
</section>

{{-- Contact --}}
<section id="contact" class="py-16 md:py-24 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-orange-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <div>
                <span class="section-tag section-tag-dark reveal">Get In Touch</span>
                <h2 class="reveal reveal-delay-1 text-3xl md:text-4xl font-bold text-white mb-6">Contact Us</h2>
                <p class="reveal reveal-delay-2 text-slate-400 leading-relaxed mb-8">Have a question about our logistics services? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>

                <div class="space-y-5">
                    <div class="contact-info-item reveal reveal-delay-2">
                        <div class="contact-info-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Address</h4>
                            <a href="https://maps.app.goo.gl/YN5rEZHo91rFA5Nf6" target="_blank" rel="noopener" class="text-slate-400 text-sm hover:text-orange-400 transition-colors">Jalan Timur, 91000 Tawau, Sabah, Malaysia.</a>
                        </div>
                    </div>
                    <div class="contact-info-item reveal reveal-delay-3">
                        <div class="contact-info-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Phone</h4>
                            <a href="tel:+60198933455" class="text-slate-400 text-sm hover:text-orange-400 transition-colors">+60 19-893 3455</a>
                        </div>
                    </div>
                    <div class="contact-info-item reveal reveal-delay-4">
                        <div class="contact-info-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Email</h4>
                            <a href="mailto:info@lcaexpress.com" class="text-slate-400 text-sm hover:text-orange-400 transition-colors">info@lcaexpress.com</a>
                        </div>
                    </div>
                    <div class="contact-info-item reveal reveal-delay-4">
                        <div class="contact-info-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Business Hours</h4>
                            <p class="text-slate-400 text-sm">Monday – Saturday, 8:00 a.m. – 5:00 p.m.</p>
                        </div>
                    </div>
                </div>
            </div>

            <form id="contact-form" class="contact-form reveal reveal-delay-2" novalidate>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="John Doe" required>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="+60 12-345 6789">
                </div>
                <div class="mb-4">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-input" placeholder="How can we help?" required>
                </div>
                <div class="mb-6">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" rows="4" class="form-input resize-none" placeholder="Tell us about your logistics needs..." required></textarea>
                </div>
                <button type="submit" class="btn-primary w-full sm:w-auto">Send Message</button>
                <p id="form-success" class="hidden mt-4 text-emerald-400 text-sm font-medium">Thank you! Your message has been sent. We'll get back to you soon.</p>
            </form>
        </div>
    </div>
</section>
@endsection
