<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $desas = Desa::with('kecamatan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('kode', 'like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.desa.index', compact('desas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatans = Kecamatan::orderBy('nama')->get();
        return view('admin.desa.create', compact('kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:desa,kode',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        Desa::create($validated);

        return redirect()->route('admin.desa.index')
            ->with('success', 'Desa berhasil ditambahkan');
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
    public function edit(Desa $desa)
    {
        $kecamatans = Kecamatan::orderBy('nama')->get();
        return view('admin.desa.edit', compact('desa', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:desa,kode,' . $desa->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $desa->update($validated);

        return redirect()->route('admin.desa.index')
            ->with('success', 'Desa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();

        return redirect()->route('admin.desa.index')
            ->with('success', 'Desa berhasil dihapus');
    }

    /**
     * Create user account for desa.
     */
    public function createAkun(Desa $desa)
    {
        // Check if user already exists
        $existingUser = User::where('usable_type', Desa::class)
            ->where('usable_id', $desa->id)
            ->first();

        if ($existingUser) {
            return redirect()->route('admin.desa.index')
                ->with('error', 'Akun untuk desa ini sudah ada');
        }

        // Create new user
        User::create([
            'name' => $desa->nama,
            'username' => $desa->kode,
            'email' => strtolower($desa->kode) . '@desa.com',
            'password' => Hash::make('admin_desa'),
            'role' => 'admin_desa',
            'usable_type' => Desa::class,
            'usable_id' => $desa->id,
        ]);

        return redirect()->route('admin.desa.index')
            ->with('success', 'Akun desa berhasil dibuat. Username: ' . $desa->kode . ', Password: admin_desa');
    }

    /**
     * Reset password for desa user account.
     */
    public function resetPassword(Desa $desa)
    {
        $user = User::where('usable_type', Desa::class)
            ->where('usable_id', $desa->id)
            ->first();

        if (!$user) {
            return redirect()->route('admin.desa.index')
                ->with('error', 'Akun untuk desa ini tidak ditemukan');
        }

        $user->update([
            'password' => Hash::make('admin_desa')
        ]);

        return redirect()->route('admin.desa.index')
            ->with('success', 'Password berhasil direset. Password baru: admin_desa');
    }
}
