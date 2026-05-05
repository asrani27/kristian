<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Kristian')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation Bar (Mobile) -->
        <header class="lg:hidden bg-white shadow-sm sticky top-0 z-50">
            <div class="flex items-center justify-between px-4 py-3">
                <div class="flex items-center gap-3">
                    <button id="mobileMenuBtn" class="p-2 rounded-lg hover:bg-gray-100 transition lg:hidden">
                        <i class="fas fa-bars text-gray-600"></i>
                    </button>
                    <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center">
                        <i class="fas fa-home text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-gray-800">Kristian</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <button class="p-2 rounded-lg hover:bg-gray-100 transition" id="mobileNotifBtn">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-gradient-to-b from-dark via-gray-900 to-dark shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 lg:static lg:inset-auto lg:h-screen lg:sticky lg:top-0">
                <!-- Gradient Orbs Background -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div class="absolute top-0 left-1/4 w-48 h-48 bg-primary rounded-full filter blur-[80px] opacity-15"></div>
                    <div class="absolute bottom-0 right-1/4 w-48 h-48 bg-secondary rounded-full filter blur-[80px] opacity-15"></div>
                </div>
                
                <!-- Logo Section -->
                <div class="relative flex items-center gap-3 px-6 py-5 border-b border-white/10">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-home text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-white text-lg">Desa Kristian</h1>
                        <p class="text-xs text-gray-400">Sistem Informasi Desa</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="relative flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    @if(Auth::user()->role === 'admin')
                        @include('layouts.partials.menu_admin')
                    @elseif(Auth::user()->role === 'admin_camat')
                        @include('layouts.partials.menu_camat')
                    @elseif(Auth::user()->role === 'admin_desa')
                        @include('layouts.partials.menu_desa')
                    @endif
                </nav>

                <!-- User Section -->
                <div class="relative border-t border-white/10 p-4">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white/10 mb-3">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                            <span class="text-white font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400 capitalize">{{ Auth::user()->role === 'admin' ? 'Administrator' : Auth::user()->role }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-500/20 text-red-400 rounded-xl hover:bg-red-500/30 transition font-medium">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Overlay for mobile -->
            <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>

            <!-- Main Content -->
            <main class="flex-1 min-h-screen">
                <!-- Desktop Header -->
                <header class="hidden lg:flex items-center justify-between px-8 py-5 bg-white shadow-sm sticky top-0 z-10">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">@yield('header', 'Dashboard')</h2>
                        <p class="text-sm text-gray-500 mt-0.5">@yield('breadcrumb', 'Selamat datang di sistem')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Notifications -->
                        <button class="relative p-3 rounded-xl hover:bg-gray-100 transition" id="desktopNotifBtn">
                            <i class="fas fa-bell text-gray-600 text-lg"></i>
                            <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                        </button>
                        
                        <!-- User Menu -->
                        <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                            <div class="text-right">
                                <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
                            </div>
                            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                                <span class="text-white font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <div class="p-4 lg:p-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
            sidebarOverlay.classList.toggle('hidden');
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', toggleSidebar);
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', toggleSidebar);
        }
    </script>
    @stack('scripts')
</body>
</html>
