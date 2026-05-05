@extends('layouts.app')

@section('title', 'Kecamatan')
@section('header', 'Kecamatan')
@section('breadcrumb', 'Kelola Data Kecamatan')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <!-- Header & Search -->
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Daftar Kecamatan</h3>
                    <p class="text-sm text-gray-500">Kelola data kecamatan</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <form action="{{ route('admin.kecamatan.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}" 
                            placeholder="Cari kecamatan..." 
                            class="w-full sm:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </form>
                    <a href="{{ route('admin.kecamatan.create') }}" 
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Kecamatan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jumlah Desa</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kecamatans as $index => $kecamatan)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $kecamatans->firstItem() + $index }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-primary/10 text-primary text-sm font-medium">
                                    {{ $kecamatan->kode }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-800">{{ $kecamatan->nama }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $kecamatan->desas->count() }} Desa
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.kecamatan.edit', $kecamatan->id) }}" 
                                        class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($kecamatan->user)
                                        <form action="{{ route('admin.kecamatan.resetPassword', $kecamatan->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin reset password akun kecamatan ini?')"
                                                class="p-2 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition" title="Reset Password">
                                                <i class="fas fa-key"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.kecamatan.createAkun', $kecamatan->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin membuat akun untuk kecamatan ini?')"
                                                class="p-2 rounded-lg bg-purple-50 text-purple-600 hover:bg-purple-100 transition" title="Buat Akun">
                                                <i class="fas fa-user-plus"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.kecamatan.destroy', $kecamatan->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kecamatan ini?')"
                                            class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-map-marked-alt text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">Belum ada data kecamatan</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($kecamatans->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $kecamatans->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
