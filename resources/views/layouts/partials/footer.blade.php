<footer class="bg-dark py-16 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-12">
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center">
                        <i class="fas fa-home text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-white">Desa Kristian</span>
                </div>
                <p class="text-gray-400 leading-relaxed">
                    Desa Kristian adalah desa wisata yang terletak di kawasan perbukitan dengan pemandangan alam yang indah dan budaya yang kaya.
                </p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-6">Link Cepat</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition">Beranda</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition">Profil Desa</a></li>
                    <li><a href="{{ route('home') }}#kegiatan" class="text-gray-400 hover:text-primary transition">Kegiatan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition">Pengumuman</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-6">Kontak Kami</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-center gap-3">
                        <i class="fas fa-map-marker-alt text-primary w-5"></i>
                        Jl. Desa Kristian No. 1
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-primary w-5"></i>
                        (021) 1234-5678
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-primary w-5"></i>
                        info@desakristian.id
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-clock text-primary w-5"></i>
                        Senin - Jumat: 08.00 - 16.00
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-8 text-center">
            <p class="text-gray-500">© 2026 Desa Kristian. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>
