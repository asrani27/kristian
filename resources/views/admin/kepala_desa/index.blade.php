@extends('layouts.app')

@section('title', 'Kepala Desa')
@section('header', 'Kepala Desa')
@section('breadcrumb', 'Kelola Data Kepala Desa')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <!-- Header & Search -->
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Daftar Kepala Desa</h3>
                    <p class="text-sm text-gray-500">Kelola data kepala desa</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <form action="{{ route('admin.kepala-desa.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}" 
                            placeholder="Cari kepala desa..." 
                            class="w-full sm:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </form>
                    <a href="{{ route('admin.kepala-desa.create') }}" 
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Desa</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kepalaDesas as $index => $kepalaDesa)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $kepalaDesas->firstItem() + $index }}</td>
                            <td class="px-6 py-4">
                                @if($kepalaDesa->foto)
                                    <img src="{{ asset('storage/' . $kepalaDesa->foto) }}" alt="{{ $kepalaDesa->nama }}" class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center">
                                        <i class="fas fa-user text-primary"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-800">{{ $kepalaDesa->nama }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $kepalaDesa->nik }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">{{ $kepalaDesa->desa->nama ?? '-' }}</span>
                                    <p class="text-xs text-gray-400">{{ $kepalaDesa->desa->kecamatan->nama ?? '' }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($kepalaDesa->status == 'aktif')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-medium">
                                        Aktif
                                    </span>
                                @elseif($kepalaDesa->status == 'demission')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-medium">
                                        Demisioner
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-red-100 text-red-700 text-xs font-medium">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.kepala-desa.edit', $kepalaDesa->id) }}" 
                                        class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.kepala-desa.destroy', $kepalaDesa->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
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
                                    <p class="text-gray-500">Belum ada data kepala desa</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($kepalaDesas->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $kepalaDesas->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
