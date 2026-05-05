<p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Menu Utama</p>

<a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.dashboard')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-chart-pie w-5"></i>
    <span class="font-medium">Dashboard</span>
</a>

<a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.users.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-users w-5"></i>
    <span class="font-medium">Manajemen User</span>
</a>

<a href="{{ route('admin.kecamatan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.kecamatan.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-map-marked-alt w-5"></i>
    <span class="font-medium">Kecamatan</span>
</a>

<a href="{{ route('admin.camat.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.camat.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-user-tie w-5"></i>
    <span class="font-medium">Camat</span>
</a>

<a href="{{ route('admin.desa.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.desa.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-home w-5"></i>
    <span class="font-medium">Desa</span>
</a>

<a href="{{ route('admin.kepala-desa.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.kepala-desa.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-user-tie w-5"></i>
    <span class="font-medium">Kepala Desa</span>
</a>

<a href="{{ route('admin.kegiatan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.kegiatan.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-clipboard-list w-5"></i>
    <span class="font-medium">Kegiatan</span>
</a>

<a href="{{ route('admin.laporan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition @if(request()->routeIs('admin.laporan.*')) bg-primary text-white shadow-lg shadow-primary/30 @else text-gray-300 hover:bg-white/10 @endif">
    <i class="fas fa-file-alt w-5"></i>
    <span class="font-medium">Laporan</span>
</a>
