@extends('layouts.app')

@section('title', 'Tambah Kepala Desa')
@section('header', 'Kepala Desa')
@section('breadcrumb', 'Tambah Data Kepala Desa')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('admin.kepala-desa.index') }}" class="p-2 rounded-lg hover:bg-gray-100 transition">
                    <i class="fas fa-arrow-left text-gray-600"></i>
                </a>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Tambah Kepala Desa</h3>
                    <p class="text-sm text-gray-500">Tambah data kepala desa baru</p>
                </div>
            </div>

            <form action="{{ route('admin.kepala-desa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('nik') border-red-500 @enderror"
                                placeholder="Masukkan NIK">
                            @error('nik')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('nama') border-red-500 @enderror"
                                placeholder="Masukkan nama lengkap">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="desa_id" class="block text-sm font-medium text-gray-700 mb-2">Desa</label>
                            <select name="desa_id" id="desa_id" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('desa_id') border-red-500 @enderror">
                                <option value="">-- Pilih Desa --</option>
                                @foreach($desas as $desa)
                                    <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                        {{ $desa->nama }} - {{ $desa->kecamatan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('desa_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('status') border-red-500 @enderror">
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="demission" {{ old('status') == 'demission' ? 'selected' : '' }}>Demisioner</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="tanggal_menjabat" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Menjabat</label>
                            <input type="date" name="tanggal_menjabat" id="tanggal_menjabat" value="{{ old('tanggal_menjabat') }}" required
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('tanggal_menjabat') border-red-500 @enderror">
                            @error('tanggal_menjabat')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_demisioner" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Demisioner</label>
                            <input type="date" name="tanggal_demisioner" id="tanggal_demisioner" value="{{ old('tanggal_demisioner') }}"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('tanggal_demisioner') border-red-500 @enderror">
                            @error('tanggal_demisioner')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('alamat') border-red-500 @enderror"
                            placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
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
                    <a href="{{ route('admin.kepala-desa.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
