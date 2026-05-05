<nav class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center">
                        <i class="fas fa-home text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-dark">Desa Kristian</span>
                </a>
            </div>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary transition font-medium">Beranda</a>
                <a href="{{ route('home') }}#kegiatan" class="text-gray-600 hover:text-primary transition font-medium">Kegiatan</a>
            
                <a href="/login" class="border-2 border-primary text-primary hover:bg-primary hover:text-white px-5 py-2 rounded-full font-medium transition flex items-center gap-2">
                    <i class="fas fa-sign-in-alt text-sm"></i>
                    Login
                </a>
            </div>
            <button class="md:hidden text-gray-600" id="mobileMenuBtn">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
</nav>

<script>
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            // Toggle mobile menu functionality
        });
    }
</script>
