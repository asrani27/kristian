@extends('layouts.app')

@section('title', 'Tambah Kegiatan')
@section('header', 'Kegiatan')
@section('breadcrumb', 'Tambah Data Kegiatan')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('desa.kegiatan.index') }}" class="p-2 rounded-lg hover:bg-gray-100 transition">
                    <i class="fas fa-arrow-left text-gray-600"></i>
                </a>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Tambah Kegiatan</h3>
                    <p class="text-sm text-gray-500">Tambah data kegiatan baru di {{ $desa->nama ?? 'Desa' }}</p>
                </div>
            </div>

            <form action="{{ route('desa.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('nama') border-red-500 @enderror"
                                placeholder="Masukkan nama kegiatan">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kegiatan</label>
                            <input type="text" name="jenis" id="jenis" value="{{ old('jenis') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('jenis') border-red-500 @enderror"
                                placeholder="Contoh: gotong royong, rapat, dll">
                            @error('jenis')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('tanggal_mulai') border-red-500 @enderror">
                            @error('tanggal_mulai')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('tanggal_selesai') border-red-500 @enderror">
                            @error('tanggal_selesai')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('lokasi') border-red-500 @enderror"
                            placeholder="Masukkan lokasi kegiatan">
                        @error('lokasi')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('alamat') border-red-500 @enderror"
                            placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('deskripsi') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi kegiatan">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                        <input type="file" name="foto" id="foto"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('foto') border-red-500 @enderror"
                            accept="image/*">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                        @error('foto')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <button type="submit" class="px-6 py-2.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition font-medium shadow-lg shadow-primary/30">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                    <a href="{{ route('desa.kegiatan.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
