<!-- Header / Navigation -->
<header class="w-full max-w-7xl mx-auto px-6 py-8 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-xl bg-indigo-600 flex items-center justify-center shadow-lg shadow-indigo-600/30">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11.35M9 12c0 3.554-1.254 6.727-3.32 9.49C3.627 18.736 2.5 15.5 2.5 12c0-3.48 1.13-6.685 3.033-9.31M17.5 12c0 3.554 1.254 6.727 3.32 9.49a12.454 12.454 0 002.68-7.74c0-3.48-1.13-6.685-3.033-9.31M17.5 12l-.022-.09A13.916 13.916 0 0015 11.35M15 11.35a13.921 13.921 0 00-1.748-4.223M15 11.35L14.77 12.2m-5.77 0l.053-.09M9 11.35a13.92 13.92 0 011.747-4.223M12 5.38C12 3.5 13.5 2 15.5 2c1.78 0 3.25 1.3 3.46 3L17.5 5.38" />
            </svg>
        </div>
        <a href="/" class="font-bold text-xl tracking-tight text-gray-900">SocialAuth</a>
    </div>

    <nav class="flex items-center gap-4">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-semibold px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition shadow-sm">Register</a>
                @endif
            @endauth
        @endif
    </nav>
</header>
