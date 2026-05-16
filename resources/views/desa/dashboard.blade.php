@extends('layouts.app')

@section('title', 'Dashboard - Sistem Desa Kristian')
@section('header', 'Dashboard')
@section('breadcrumb', 'Ringkasan Desa')

@push('styles')
<style>
    .stat-card {
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
    }

    .gradient-bg-1 {
        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    }

    .gradient-bg-2 {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    }

    .gradient-bg-3 {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .gradient-bg-4 {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }
</style>
@endpush

@section('content')
<!-- Desa Info -->
<div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-6 mb-6 text-white">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold">{{ $desa->nama ?? 'Desa' }}</h2>
            <p class="text-white/80 mt-1">Selamat datang, {{ Auth::user()->name }}</p>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full">
            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
            <span class="text-sm font-medium">Online</span>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
    <!-- Total Kegiatan -->
    <div class="stat-card bg-white rounded-2xl shadow-sm border border-gray-100 p-4 lg:p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-sky-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-clipboard-list text-white text-lg lg:text-xl"></i>
            </div>
            <div>
                <p class="text-xs lg:text-sm text-gray-500 font-medium">Total Kegiatan</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $stats['total_kegiatan'] }}</p>
            </div>
        </div>
    </div>

    <!-- Kegiatan Berlangsung -->
    <div class="stat-card bg-white rounded-2xl shadow-sm border border-gray-100 p-4 lg:p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-spinner text-white text-lg lg:text-xl"></i>
            </div>
            <div>
                <p class="text-xs lg:text-sm text-gray-500 font-medium">Berlangsung</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $stats['kegiatan_berlangsung'] }}</p>
            </div>
        </div>
    </div>

    <!-- Kegiatan Akan Datang -->
    <div class="stat-card bg-white rounded-2xl shadow-sm border border-gray-100 p-4 lg:p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-calendar-plus text-white text-lg lg:text-xl"></i>
            </div>
            <div>
                <p class="text-xs lg:text-sm text-gray-500 font-medium">Akan Datang</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $stats['kegiatan_akan_datang'] }}</p>
            </div>
        </div>
    </div>

    <!-- Kegiatan Selesai -->
    <div class="stat-card bg-white rounded-2xl shadow-sm border border-gray-100 p-4 lg:p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-check-circle text-white text-lg lg:text-xl"></i>
            </div>
            <div>
                <p class="text-xs lg:text-sm text-gray-500 font-medium">Selesai</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $stats['kegiatan_selesai'] }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
    <!-- Recent Activities -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-4 lg:px-6 py-4 lg:py-5 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="font-bold text-gray-800 text-lg">Kegiatan Terbaru</h3>
                <p class="text-sm text-gray-500 mt-0.5">Kegiatan di desa Anda</p>
            </div>
            <a href="{{ route('desa.kegiatan.index') }}"
                class="text-primary hover:text-sky-600 text-sm font-medium flex items-center gap-1 transition">
                Lihat Semua
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        <div class="p-4 lg:p-6">
            @if($recentActivities->count() > 0)
            <div class="space-y-4">
                @foreach($recentActivities as $activity)
                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition">
                    <div
                        class="w-10 h-10 lg:w-12 lg:h-12 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-calendar-check text-primary"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-medium text-gray-800 truncate">{{ $activity->nama }}</h4>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-tag mr-1"></i>
                            {{ $activity->jenis }}
                        </p>
                        <div class="flex items-center gap-4 mt-2 text-xs text-gray-400">
                            <span>
                                <i class="far fa-calendar mr-1"></i>
                                {{ \Carbon\Carbon::parse($activity->tanggal_mulai)->format('d M Y') }}
                            </span>
                            <span class="px-2 py-0.5 rounded-full 
                                        @if($activity->status === 'completed') bg-green-100 text-green-700
                                        @elseif($activity->status === 'ongoing') bg-blue-100 text-blue-700
                                        @else bg-gray-100 text-gray-700
                                        @endif">
                                {{ ucfirst($activity->status ?? 'pending') }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                </div>
                <p class="text-gray-500">Belum ada kegiatan</p>
                <a href="{{ route('desa.kegiatan.create') }}"
                    class="inline-block mt-4 px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-sky-600 transition">
                    Tambah Kegiatan
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions & Info -->
    <div class="space-y-4 lg:space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 lg:p-6">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('desa.kegiatan.create') }}"
                    class="flex items-center gap-3 p-3 rounded-xl bg-primary/5 hover:bg-primary/10 text-primary transition">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-plus text-white text-sm"></i>
                    </div>
                    <span class="font-medium">Tambah Kegiatan</span>
                </a>
                <a href="{{ route('desa.kegiatan.index') }}"
                    class="flex items-center gap-3 p-3 rounded-xl bg-purple-500/5 hover:bg-purple-500/10 text-purple-600 transition">
                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clipboard text-white text-sm"></i>
                    </div>
                    <span class="font-medium">Kelola Kegiatan</span>
                </a>
            </div>
        </div>

        <!-- User Profile Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 lg:p-6">
            <div class="text-center">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-white text-2xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <h4 class="font-bold text-gray-800">{{ Auth::user()->name }}</h4>
                <p class="text-sm text-gray-500 capitalize">Kepala Desa</p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex justify-center gap-6 text-xs text-gray-500">
                        <div class="text-center">
                            <p class="font-bold text-gray-800">{{ date('d') }}</p>
                            <p>{{ date('M') }}</p>
                        </div>
                        <div class="text-center">
                            <p class="font-bold text-gray-800">{{ date('H:i') }}</p>
                            <p>Waktu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection