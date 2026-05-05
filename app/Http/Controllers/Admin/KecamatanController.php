<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $kecamatans = Kecamatan::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                         ->orWhere('kode', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.kecamatan.index', compact('kecamatans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:kecamatan,kode',
            'nama' => 'required|string|max:255',
        ]);

        Kecamatan::create($validated);

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Kecamatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('admin.kecamatan.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:kecamatan,kode,' . $kecamatan->id,
            'nama' => 'required|string|max:255',
        ]);

        $kecamatan->update($validated);

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Kecamatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Kecamatan berhasil dihapus');
    }

    /**
     * Create user account for kecamatan.
     */
    public function createAkun(Kecamatan $kecamatan)
    {
        // Check if user already exists
        $existingUser = User::where('usable_type', Kecamatan::class)
            ->where('usable_id', $kecamatan->id)
            ->first();

        if ($existingUser) {
            return redirect()->route('admin.kecamatan.index')
                ->with('error', 'Akun untuk kecamatan ini sudah ada');
        }

        // Create new user
        User::create([
            'name' => $kecamatan->nama,
            'username' => $kecamatan->kode,
            'email' => strtolower($kecamatan->kode) . '@kecamatan.com',
            'password' => Hash::make('kecamatan'),
            'role' => 'admin_camat',
            'usable_type' => Kecamatan::class,
            'usable_id' => $kecamatan->id,
        ]);

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Akun kecamatan berhasil dibuat. Username: ' . $kecamatan->kode . ', Password: kecamatan');
    }

    /**
     * Reset password for kecamatan user account.
     */
    public function resetPassword(Kecamatan $kecamatan)
    {
        $user = User::where('usable_type', Kecamatan::class)
            ->where('usable_id', $kecamatan->id)
            ->first();

        if (!$user) {
            return redirect()->route('admin.kecamatan.index')
                ->with('error', 'Akun untuk kecamatan ini tidak ditemukan');
        }

        $user->update([
            'password' => Hash::make('kecamatan')
        ]);

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Password berhasil direset. Password baru: kecamatan');
    }
}
