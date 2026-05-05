@extends('layouts.app')

@section('title', 'Tambah User')
@section('header', 'Manajemen User')
@section('breadcrumb', 'Tambah Data User')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('admin.users.index') }}" class="p-2 rounded-lg hover:bg-gray-100 transition">
                    <i class="fas fa-arrow-left text-gray-600"></i>
                </a>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Tambah User</h3>
                    <p class="text-sm text-gray-500">Tambah user administrator baru</p>
                </div>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                
                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('username') border-red-500 @enderror"
                            placeholder="Masukkan username">
                        @error('username')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('email') border-red-500 @enderror"
                            placeholder="Masukkan email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition @error('password') border-red-500 @enderror"
                            placeholder="Minimal 8 karakter">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition"
                            placeholder="Ulangi password">
                    </div>

                    <div class="p-4 bg-primary/5 rounded-xl border border-primary/20">
                        <div class="flex items-center gap-2 text-primary">
                            <i class="fas fa-info-circle"></i>
                            <span class="font-medium">Role Default: Admin</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">User baru yang ditambahkan akan memiliki role sebagai administrator.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <button type="submit" class="px-6 py-2.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition font-medium shadow-lg shadow-primary/30">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection