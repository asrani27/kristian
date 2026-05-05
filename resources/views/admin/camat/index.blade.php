@extends('layouts.app')

@section('title', 'Camat')
@section('header', 'Camat')
@section('breadcrumb', 'Kelola Data Camat')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <!-- Header & Search -->
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Daftar Camat</h3>
                    <p class="text-sm text-gray-500">Kelola data camat</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <form action="{{ route('admin.camat.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}" 
                            placeholder="Cari camat..." 
                            class="w-full sm:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </form>
                    <a href="{{ route('admin.camat.create') }}" 
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

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-primary to-secondary">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">NIP</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kecamatan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Tanggal Menjabat</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($camats as $index => $camat)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $camats->firstItem() + $index }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-primary/10 text-primary text-sm font-medium">
                                    {{ $camat->nip }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-800">{{ $camat->nama }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $camat->kecamatan->nama ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($camat->status == 'aktif')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-sm font-medium">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $camat->tanggal_menjabat ? \Carbon\Carbon::parse($camat->tanggal_menjabat)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.camat.edit', $camat->id) }}" 
                                        class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.camat.destroy', $camat->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus camat ini?')"
                                            class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-user-tie text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">Belum ada data camat</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($camats->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $camats->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection