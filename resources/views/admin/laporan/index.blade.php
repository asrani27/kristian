@extends('layouts.app')

@section('title', 'Laporan')
@section('header', 'Laporan')
@section('breadcrumb', 'Menu Laporan')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Menu Laporan</h1>
        <p class="text-gray-500 mt-1">Cetak laporan dalam bentuk PDF untuk semua data</p>
    </div>

    <!-- Report Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Kecamatan Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-blue-500/30">
                    <i class="fas fa-map-marked-alt text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Kecamatan</h3>
                <p class="text-gray-500 text-sm mb-4">Cetak laporan data kecamatan dalam format PDF</p>
                <a href="{{ route('admin.laporan.kecamatan.pdf') }}" target="_blank" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition font-medium text-sm">
                    <i class="fas fa-print"></i>
                    <span>Cetak PDF</span>
                </a>
            </div>
        </div>

        <!-- Kecamatan Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-indigo-500/30">
                    <i class="fas fa-user-tie text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Camat</h3>
                <p class="text-gray-500 text-sm mb-4">Cetak laporan data camat dalam format PDF</p>
                <a href="{{ route('admin.laporan.camat.pdf') }}" target="_blank" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-500 text-white rounded-xl hover:bg-indigo-600 transition font-medium text-sm">
                    <i class="fas fa-print"></i>
                    <span>Cetak PDF</span>
                </a>
            </div>
        </div>

        <!-- Desa Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-emerald-500/30">
                    <i class="fas fa-home text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Desa</h3>
                <p class="text-gray-500 text-sm mb-4">Cetak laporan data desa dalam format PDF</p>
                <a href="{{ route('admin.laporan.desa.pdf') }}" target="_blank" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition font-medium text-sm">
                    <i class="fas fa-print"></i>
                    <span>Cetak PDF</span>
                </a>
            </div>
        </div>

        <!-- Kepala Desa Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-amber-500/30">
                    <i class="fas fa-user text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Kepala Desa</h3>
                <p class="text-gray-500 text-sm mb-4">Cetak laporan data kepala desa dalam format PDF</p>
                <a href="{{ route('admin.laporan.kepala-desa.pdf') }}" target="_blank" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-500 text-white rounded-xl hover:bg-amber-600 transition font-medium text-sm">
                    <i class="fas fa-print"></i>
                    <span>Cetak PDF</span>
                </a>
            </div>
        </div>

        <!-- Kegiatan Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300 md:col-span-2 lg:col-span-2">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                        <i class="fas fa-clipboard-list text-white text-xl"></i>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Kegiatan</h3>
                <p class="text-gray-500 text-sm mb-4">Cetak laporan data kegiatan berdasarkan periode tahun</p>
                
                <form action="{{ route('admin.laporan.kegiatan.pdf') }}" target="_blank" method="GET" class="flex flex-wrap items-end gap-3">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                    </div>
                    <button type="submit" 
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-500 text-white rounded-xl hover:bg-purple-600 transition font-medium text-sm shadow-lg shadow-purple-500/30">
                        <i class="fas fa-print"></i>
                        <span>Cetak PDF</span>
                    </button>
                </form>
            </div>
        </div>

    </div>

    <!-- Info Box -->
    <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-xl">
        <div class="flex items-start gap-3">
            <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
            <div>
                <h4 class="font-medium text-blue-800">Informasi</h4>
                <p class="text-sm text-blue-600 mt-1">
                    Laporan akan dibuka di tab baru dalam format PDF. Pastikan Anda memiliki pembaca PDF yang terinstal di browser Anda.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
