<p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Menu Utama</p>

<a href="{{ route('camat.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('camat.dashboard')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-chart-pie w-5"></i>
    <span class="font-medium">Dashboard</span>
</a>

<a href="{{ route('camat.desa.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('camat.desa.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-home w-5"></i>
    <span class="font-medium">Desa</span>
</a>

<a href="{{ route('camat.kegiatan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('camat.kegiatan.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-clipboard-list w-5"></i>
    <span class="font-medium">Kegiatan</span>
</a>
