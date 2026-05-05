@extends('layouts.master')

@section('title', 'Informasi Kegiatan Desa - Desa Kristian')

@push('styles')
<style>
    .gradient-text {
        background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-dark via-gray-900 to-dark pt-32 pb-20">
    <!-- Background Text -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -left-10 text-[15rem] md:text-[20rem] font-bold text-white/[0.03] select-none leading-none">
            DESA
        </div>
        <div class="absolute -bottom-10 -right-10 text-[15rem] md:text-[20rem] font-bold text-white/[0.03] select-none leading-none">
                KUALA
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[8rem] md:text-[12rem] font-bold text-white/[0.02] select-none leading-none">
            2026
        </div>
    </div>
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary rounded-full filter blur-[128px]"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-secondary rounded-full filter blur-[128px]"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur rounded-full text-primary text-sm font-medium mb-6">
                📰 Portal Informasi Desa
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Kegiatan & Berita<br>
                <span class="gradient-text">Desa Kuala</span>
            </h1>
            <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-10">
                Temukan informasi terbaru tentang berbagai kegiatan, program, dan pengumuman dari Pemerintahan Desa Kristian
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#kegiatan" class="bg-primary hover:bg-sky-600 text-white px-8 py-4 rounded-full font-semibold transition shadow-xl shadow-primary/30 flex items-center justify-center gap-2">
                    <i class="fas fa-newspaper"></i>
                    Lihat Kegiatan
                </a>
                <a href="#" class="bg-white/10 backdrop-blur hover:bg-white/20 text-white px-8 py-4 rounded-full font-semibold transition border border-white/20 flex items-center justify-center gap-2">
                    <i class="fas fa-bell"></i>
                    Pengumuman
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post -->
@if($featured)
<section class="py-16 bg-gradient-to-br from-white via-slate-50 to-sky-50" id="kegiatan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl overflow-hidden card-hover border border-gray-100">
            <div class="grid lg:grid-cols-2">
                <div class="h-64 lg:h-96 overflow-hidden bg-gradient-to-br from-slate-100 to-slate-200">
                    @if($featured->foto)
                        <img src="{{ asset('storage/' . $featured->foto) }}" alt="{{ $featured->nama }}" class="w-full h-full object-cover object-center">
                    @else
                        <div class="bg-gradient-to-br from-primary to-secondary w-full h-full flex items-center justify-center">
                            <div class="text-center text-white/90">
                                <i class="fas fa-hands-helping text-8xl mb-4"></i>
                                <p class="text-xl font-medium">{{ $featured->jenis }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-full text-sm font-semibold w-fit mb-4">
                        <i class="fas fa-fire"></i> Terbaru
                    </span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-dark mb-4">
                        {{ $featured->nama }}
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ $featured->deskripsi }}
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($featured->tanggal_mulai)->format('d F Y') }}
                        </span>
                        <span class="flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-primary"></i> {{ $featured->desa->nama ?? 'N/A' }}
                        </span>
                    </div>
                    <a href="{{ route('kegiatan.detail', $featured->id) }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Stats -->
<section class="py-16 bg-gradient-to-r from-dark to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-white mb-2">{{ $totalKegiatan ?? 0 }}</div>
                <div class="text-gray-400">Total Kegiatan</div>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-primary mb-2">156</div>
                <div class="text-gray-400">Jumlah Warga</div>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-secondary mb-2">8</div>
                <div class="text-gray-400">RT/RW</div>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-white mb-2">12</div>
                <div class="text-gray-400">Mendatang</div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Grid -->
<section class="py-20 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-4">
                📋 Kegiatan Terbaru
            </span>
            <h2 class="text-3xl lg:text-4xl font-bold text-dark mb-4">Artikel & Berita Desa</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Ikuti terus informasi dan berita terkini dari Desa Kristian</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($kegiatans as $kegiatan)
            <article class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden card-hover group border border-gray-100">
                @if($kegiatan->foto)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="{{ $kegiatan->nama }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300">
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                        <i class="fas fa-calendar-check text-white text-6xl group-hover:scale-110 transition-transform"></i>
                    </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-xs font-semibold">{{ $kegiatan->jenis }}</span>
                        <span class="text-gray-400 text-sm">{{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d F Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition-colors">
                        {{ $kegiatan->nama }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ $kegiatan->deskripsi }}
                    </p>
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        {{ $kegiatan->desa->nama_desa ?? 'N/A' }}
                    </div>
                    <a href="{{ route('kegiatan.detail', $kegiatan->id) }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-12">
                <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-500">Belum ada kegiatan yang tersedia</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-20 bg-gradient-to-br from-dark to-gray-900 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary rounded-full filter blur-[128px] opacity-20"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-secondary rounded-full filter blur-[128px] opacity-20"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-envelope text-white text-2xl"></i>
        </div>
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Berlangganan Berita Desa</h2>
        <p class="text-gray-400 mb-8">Dapatkan informasi terbaru langsung ke email Anda</p>
        <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
            <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-6 py-4 rounded-full bg-white/10 backdrop-blur border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-primary transition">
            <button type="submit" class="bg-primary hover:bg-sky-600 text-white px-8 py-4 rounded-full font-semibold transition shadow-xl shadow-primary/30 flex items-center justify-center gap-2">
                <i class="fas fa-paper-plane"></i>
                Berlangganan
            </button>
        </form>
    </div>
</section>
@endsection
