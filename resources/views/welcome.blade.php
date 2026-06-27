<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Social Authentication</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS (via Vite or Fallback CDN to ensure it works instantly) -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif

        <style>
            body {
                font-family: 'Figtree', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100 text-gray-900 min-h-screen flex flex-col justify-between selection:bg-indigo-500 selection:text-white">

        <!-- Header / Navigation -->
        @auth
            @include('layouts.navigation')
        @else
            @include('layouts.header')
        @endauth

        <!-- Hero Section -->
        <main class="flex-grow flex items-center justify-center px-6 py-12 relative overflow-hidden">
            <!-- Background Decorative Blur Rings -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-indigo-600/5 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="max-w-2xl text-center z-10 bg-white p-8 sm:p-12 rounded-2xl shadow-sm border border-gray-200">
                <span class="px-3 py-1 text-xs font-semibold text-indigo-600 bg-indigo-50 rounded-full border border-indigo-100 inline-block mb-6 uppercase tracking-wider">
                    Laravel Socialite Integration
                </span>

                <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-gray-900 mb-6 leading-tight">
                    One-Click Authentication
                </h1>

                <p class="text-lg text-gray-600 mb-10 max-w-xl mx-auto leading-relaxed">
                    A clean demonstration project for implementing social authentication using Google OAuth in a Laravel environment. Easy, secure, and user-friendly.
                </p>

                <div class="w-full max-w-md mx-auto">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-md transition flex items-center justify-center gap-2">
                            <span>Go to Dashboard</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-md transition flex items-center justify-center gap-2">
                            <span>Get Started</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>

                        <!-- Divider -->
                        <div class="my-6 flex items-center justify-between">
                            <span class="border-b w-1/4 border-gray-200/60"></span>
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Or Connect Instantly</span>
                            <span class="border-b w-1/4 border-gray-200/60"></span>
                        </div>

                        <!-- Social Login Buttons -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Google -->
                            <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="flex items-center justify-center gap-3 px-4 py-3.5 border border-gray-200/80 rounded-2xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 hover:shadow hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-200 ease-in-out transform">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                                <span>Google</span>
                            </a>

                            <!-- Microsoft -->
                            <a href="{{ route('social.redirect', ['provider' => 'microsoft']) }}" class="flex items-center justify-center gap-3 px-4 py-3.5 border border-gray-200/80 rounded-2xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 hover:shadow hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-200 ease-in-out transform">
                                <svg class="h-4 w-4" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0" y="0" width="11" height="11" fill="#f25022"/>
                                    <rect x="12" y="0" width="11" height="11" fill="#7fba00"/>
                                    <rect x="0" y="12" width="11" height="11" fill="#00a4ef"/>
                                    <rect x="12" y="12" width="11" height="11" fill="#ffb900"/>
                                </svg>
                                <span>Microsoft</span>
                            </a>

                            <!-- GitHub -->
                            <a href="{{ route('social.redirect', ['provider' => 'github']) }}" class="flex items-center justify-center gap-3 px-4 py-3.5 border border-gray-200/80 rounded-2xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 hover:shadow hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-200 ease-in-out transform">
                                <svg class="h-5 w-5 fill-current text-gray-900" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                                <span>GitHub</span>
                            </a>

                            <!-- X -->
                            <a href="{{ route('social.redirect', ['provider' => 'x']) }}" class="flex items-center justify-center gap-3 px-4 py-3.5 border border-gray-200/80 rounded-2xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 hover:shadow hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-200 ease-in-out transform">
                                <svg class="h-4 w-4 fill-current text-gray-900" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                <span>X</span>
                            </a>

                            <!-- Discord -->
                            <a href="{{ route('social.redirect', ['provider' => 'discord']) }}" class="col-span-2 flex items-center justify-center gap-3 px-4 py-3.5 border border-gray-200/80 rounded-2xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 hover:shadow hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-200 ease-in-out transform">
                                <svg class="h-5 w-5 fill-current text-[#5865F2]" viewBox="0 0 127.14 96.36" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M107.7,8.07A105.15,105.15,0,0,0,81.47,0a72.06,72.06,0,0,0-3.36,6.83A97.68,97.68,0,0,0,49,6.83,72.37,72.37,0,0,0,45.64,0,105.89,105.89,0,0,0,19.39,8.09C2.79,32.65-1.71,56.6.54,80.21h0A105.73,105.73,0,0,0,32.71,96.36,77.7,77.7,0,0,0,39.6,85.25a68.42,68.42,0,0,1-10.85-5.18c.91-.66,1.8-1.34,2.66-2a75.57,75.57,0,0,0,64.32,0c.87.71,1.76,1.39,2.66,2a68.68,68.68,0,0,1-10.87,5.19,77,77,0,0,0,6.89,11.1A105.25,105.25,0,0,0,126.6,80.22h0C129.24,52.84,122.09,29.11,107.7,8.07ZM42.45,65.69C36.18,65.69,31,60,31,53s5-12.74,11.43-12.74S54,46,53.89,53,48.84,65.69,42.45,65.69Zm42.24,0C78.41,65.69,73.31,60,73.31,53s5-12.74,11.43-12.74S96,46,96.11,53,91.08,65.69,84.69,65.69Z"/>
                                </svg>
                                <span>Discord</span>
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Features list -->
                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-6 text-left border-t border-gray-150 pt-8">
                    <div class="flex items-start gap-3">
                        <div class="h-6 w-6 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 mt-0.5">✓</div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">Google, Microsoft, GitHub, X & Discord</h3>
                            <p class="text-xs text-gray-500">Fast, secure login via Google, Microsoft, GitHub, X, and Discord Socialite providers.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-6 w-6 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 mt-0.5">✓</div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">Account Linking</h3>
                            <p class="text-xs text-gray-500">Safely link multiple OAuth accounts to a single email.</p>
                        </div>
                    </div>
                </div>

                <!-- GitHub Badge -->
                <div class="mt-8 pt-4 border-t border-gray-100 flex justify-center">
                    <a href="https://github.com/youssefhossam29" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-lg text-sm font-medium transition shadow-sm">
                        <!-- GitHub Icon -->
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                        </svg>
                        <span>Follow on GitHub</span>
                    </a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        @include('layouts.footer')

    </body>
</html>
