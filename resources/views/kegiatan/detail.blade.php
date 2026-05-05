@extends('layouts.master')

@section('title', $kegiatan->nama . ' - Desa Kristian')

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
<section class="relative overflow-hidden bg-gradient-to-br from-dark via-gray-900 to-dark pt-32 pb-16">
    <!-- Background Text -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -left-10 text-[15rem] md:text-[20rem] font-bold text-white/[0.03] select-none leading-none">
            DESA
        </div>
    </div>
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary rounded-full filter blur-[128px]"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-secondary rounded-full filter blur-[128px]"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition mb-6">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>
        <div class="text-center">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-primary text-sm font-semibold mb-4">
                <i class="fas fa-tag"></i> {{ $kegiatan->jenis }}
            </span>
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                {{ $kegiatan->nama }}
            </h1>
            <div class="flex flex-wrap items-center justify-center gap-6 text-gray-300">
                <span class="flex items-center gap-2">
                    <i class="fas fa-calendar text-primary"></i>
                    {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d F Y') }}
                    @if($kegiatan->tanggal_selesai)
                        - {{ \Carbon\Carbon::parse($kegiatan->tanggal_selesai)->format('d F Y') }}
                    @endif
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-primary"></i>
                    {{ $kegiatan->desa->nama_desa ?? 'Desa Kuala' }}
                </span>
            </div>
        </div>
    </div>
    
</section>

<!-- Article Content -->
<section class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image -->
        <div class="rounded-2xl mb-8 shadow-xl overflow-hidden h-64 md:h-80">
            @if($kegiatan->foto)
                <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="{{ $kegiatan->nama }}" class="w-full h-full object-cover object-center">
            @else
                <div class="bg-gradient-to-br from-primary to-secondary w-full h-full flex items-center justify-center">
                    <div class="text-center text-white/90">
                        <i class="fas fa-calendar-check text-7xl mb-4"></i>
                        <p class="text-2xl font-medium">{{ $kegiatan->jenis }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Article Body -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 md:p-10 border border-gray-100">
            <h2 class="text-2xl md:text-3xl font-bold text-dark mb-6">Deskripsi Kegiatan</h2>
            <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed mb-8">
                <p>{{ $kegiatan->deskripsi ?? 'Deskripsi kegiatan tidak tersedia.' }}</p>
            </div>

            <!-- Info Cards -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl p-6 border border-primary/20">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Tanggal Pelaksanaan</p>
                            <p class="font-bold text-dark">
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d F Y') }}
                                @if($kegiatan->tanggal_selesai)
                                    - {{ \Carbon\Carbon::parse($kegiatan->tanggal_selesai)->format('d F Y') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-secondary/10 to-secondary/5 rounded-xl p-6 border border-secondary/20">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-secondary rounded-xl flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Lokasi</p>
                            <p class="font-bold text-dark">{{ $kegiatan->desa->nama_desa ?? 'Desa Kristian' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Badge -->
            <div class="flex items-center justify-between flex-wrap gap-4 pt-6 border-t border-gray-100">
                <div class="flex items-center gap-3">
                    <span class="px-4 py-2 rounded-full 
                        @if(($kegiatan->status ?? 'pending') === 'completed') bg-green-100 text-green-700
                        @elseif(($kegiatan->status ?? 'pending') === 'ongoing') bg-blue-100 text-blue-700
                        @else bg-gray-100 text-gray-700
                        @endif text-sm font-semibold">
                        <i class="fas fa-circle text-xs mr-1 
                            @if(($kegiatan->status ?? 'pending') === 'completed') text-green-500
                            @elseif(($kegiatan->status ?? 'pending') === 'ongoing') text-blue-500
                            @else text-gray-500
                            @endif"></i>
                        {{ ucfirst($kegiatan->status ?? 'pending') }}
                    </span>
                </div>
                <span class="text-sm text-gray-400">
                    <i class="far fa-clock mr-1"></i>
                    Dipublikasikan pada {{ $kegiatan->created_at->format('d F Y') }}
                </span>
            </div>
        </div>

        <!-- Related Activities -->
        @if(isset($relatedKegiatans) && $relatedKegiatans->count() > 0)
        <div class="mt-12">
            <h3 class="text-2xl font-bold text-dark mb-6">Kegiatan Lainnya</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedKegiatans as $related)
                <a href="{{ route('kegiatan.detail', $related->id) }}" class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden card-hover group border border-gray-100">
                    @if($related->foto)
                        <div class="h-32 overflow-hidden">
                            <img src="{{ asset('storage/' . $related->foto) }}" alt="{{ $related->nama }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="h-32 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                            <i class="fas fa-calendar-check text-white text-4xl group-hover:scale-110 transition-transform"></i>
                        </div>
                    @endif
                    <div class="p-5">
                        <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-xs font-semibold">{{ $related->jenis }}</span>
                        <h4 class="font-bold text-dark mt-3 mb-2 line-clamp-2">{{ $related->nama }}</h4>
                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($related->tanggal_mulai)->format('d F Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
