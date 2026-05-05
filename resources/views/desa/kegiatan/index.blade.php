@extends('layouts.app')

@section('title', 'Kegiatan')
@section('header', 'Kegiatan')
@section('breadcrumb', 'Daftar Kegiatan Desa')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <!-- Header & Search -->
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Daftar Kegiatan</h3>
                    <p class="text-sm text-gray-500">Kelola data kegiatan {{ $desa->nama ?? 'Desa' }}</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <form action="{{ route('desa.kegiatan.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}" 
                            placeholder="Cari kegiatan..." 
                            class="w-full sm:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </form>
                    <a href="{{ route('desa.kegiatan.create') }}" 
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition font-medium shadow-lg shadow-primary/30">
                        <i class="fas fa-plus"></i>
                        <span>Tambah</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mx-6 mt-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
                <i class="fas fa-check-circle text-green-500"></i>
                <span class="text-green-700">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="mx-6 mt-4 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500"></i>
                <span class="text-red-700">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-primary to-secondary">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Kegiatan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kegiatans as $index => $kegiatan)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $kegiatans->firstItem() + $index }}</td>
                            <td class="px-6 py-4">
                                @if($kegiatan->foto)
                                    <img src="{{ Storage::url($kegiatan->foto) }}" alt="{{ $kegiatan->nama }}" class="w-12 h-12 rounded-xl object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center">
                                        <i class="fas fa-clipboard-list text-primary"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div>
                                    <span class="font-medium text-gray-800">{{ $kegiatan->nama }}</span>
                                    <p class="text-xs text-gray-400">{{ Str::limit($kegiatan->lokasi, 30) }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-purple-100 text-purple-700 text-xs font-medium">
                                    {{ $kegiatan->jenis }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div>
                                    <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d M Y') }}</span>
                                    <p class="text-xs text-gray-400">s/d {{ \Carbon\Carbon::parse($kegiatan->tanggal_selesai)->format('d M Y') }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('desa.kegiatan.edit', $kegiatan->id) }}" 
                                        class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('desa.kegiatan.destroy', $kegiatan->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')"
                                            class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-clipboard-list text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">Belum ada data kegiatan</p>
                                    <a href="{{ route('desa.kegiatan.create') }}" class="mt-4 px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition">
                                        Tambah Kegiatan
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($kegiatans->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $kegiatans->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
