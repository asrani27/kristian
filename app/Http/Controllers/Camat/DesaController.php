<?php

namespace App\Http\Controllers\Camat;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Camat;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of villages belonging to the logged-in camat's kecamatan.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        
        // Get camat data based on logged-in user
        $camat = $user->usable;
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        $search = $request->get('search');
        
        // Get villages from camat's kecamatan with search
        $desas = Desa::where('kecamatan_id', $camat->id)
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('kode', 'like', '%' . $search . '%');
            })
            ->orderBy('nama')
            ->paginate(10);
        
        return view('camat.desa.index', compact('desas', 'search', 'camat'));
    }

    /**
     * Show the form for creating a new village.
     */
    public function create()
    {
        $user = auth()->user();
        
        // Get camat data based on logged-in user
        $camat = $user->usable;
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        return view('camat.desa.create', compact('camat'));
    }

    /**
     * Store a newly created village in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        
        // Get camat data based on logged-in user
        $camat = $user->usable;
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:desa,kode',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        // Automatically assign kecamatan_id from logged-in camat
        $validated['kecamatan_id'] = $camat->id;

        Desa::create($validated);

        return redirect()->route('camat.desa.index')
            ->with('success', 'Desa berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified village.
     */
    public function edit(Desa $desa)
    {
        $user = auth()->user();
        
        // Get camat data based on logged-in user
        $camat = $user->usable;
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        // Ensure the village belongs to camat's kecamatan
        if ($desa->kecamatan_id !== $camat->id) {
            return redirect()->route('camat.desa.index')
                ->with('error', 'Anda tidak memiliki akses untuk edit desa ini');
        }
        
        return view('camat.desa.edit', compact('desa', 'camat'));
    }

    /**
     * Update the specified village in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        $user = auth()->user();
        
        // Get camat data based on logged-in user
        $camat = $user->usable;
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        // Ensure the village belongs to camat's kecamatan
        if ($desa->kecamatan_id !== $camat->id) {
            return redirect()->route('camat.desa.index')
                ->with('error', 'Anda tidak memiliki akses untuk update desa ini');
        }
        
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:desa,kode,' . $desa->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $desa->update($validated);

        return redirect()->route('camat.desa.index')
            ->with('success', 'Desa berhasil diperbarui');
    }

    /**
     * Remove the specified village from storage.
     */
    public function destroy(Desa $desa)
    {
        $user = auth()->user();
        
        // Get camat data based on logged-in user
        $camat = $user->usable;
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        // Ensure the village belongs to camat's kecamatan
        if ($desa->kecamatan_id !== $camat->id) {
            return redirect()->route('camat.desa.index')
                ->with('error', 'Anda tidak memiliki akses untuk hapus desa ini');
        }
        
        $desa->delete();

        return redirect()->route('camat.desa.index')
            ->with('success', 'Desa berhasil dihapus');
    }
}
