@extends('layouts.app')

@section('title', 'Edit Desa')
@section('header', 'Desa')
@section('breadcrumb', 'Edit Data Desa')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('camat.desa.index') }}" class="p-2 rounded-lg hover:bg-gray-100 transition">
                    <i class="fas fa-arrow-left text-gray-600"></i>
                </a>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Edit Desa</h3>
                    <p class="text-sm text-gray-500">Edit data desa di {{ $camat->kecamatan->nama ?? 'Kecamatan Anda' }}</p>
                </div>
            </div>

            <form action="{{ route('camat.desa.update', $desa->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-5">
                    <div>
                        <label for="kode" class="block text-sm font-medium text-gray-700 mb-2">Kode Desa</label>
                        <input type="text" name="kode" id="kode" value="{{ old('kode', $desa->kode) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('kode') border-red-500 @enderror"
                            placeholder="Contoh: DESA001">
                        @error('kode')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Desa</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $desa->nama) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('nama') border-red-500 @enderror"
                            placeholder="Masukkan nama desa">
                        @error('nama')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('alamat') border-red-500 @enderror"
                            placeholder="Masukkan alamat desa">{{ old('alamat', $desa->alamat) }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <button type="submit" class="px-6 py-2.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition font-medium shadow-lg shadow-primary/30">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                    <a href="{{ route('camat.desa.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
