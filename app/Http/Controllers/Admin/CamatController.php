<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camat;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class CamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $camats = Camat::with('kecamatan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('nip', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.camat.index', compact('camats', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatans = Kecamatan::orderBy('nama')->get();
        return view('admin.camat.create', compact('kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:50|unique:camat,nip',
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'tanggal_menjabat' => 'required|date',
            'tanggal_demisioner' => 'nullable|date|after:tanggal_menjabat',
            'alamat' => 'nullable|string',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        Camat::create($validated);

        return redirect()->route('admin.camat.index')
            ->with('success', 'Camat berhasil ditambahkan');
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
    public function edit(Camat $camat)
    {
        $kecamatans = Kecamatan::orderBy('nama')->get();
        return view('admin.camat.edit', compact('camat', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Camat $camat)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:50|unique:camat,nip,' . $camat->id,
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'tanggal_menjabat' => 'required|date',
            'tanggal_demisioner' => 'nullable|date|after:tanggal_menjabat',
            'alamat' => 'nullable|string',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $camat->update($validated);

        return redirect()->route('admin.camat.index')
            ->with('success', 'Camat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camat $camat)
    {
        $camat->delete();

        return redirect()->route('admin.camat.index')
            ->with('success', 'Camat berhasil dihapus');
    }

    /**
     * Display villages (desa) for the logged-in camat's kecamatan.
     */
    public function desa(Request $request)
    {
        $user = auth()->user();
        
        // Ambil camat yang login berdasarkan user_id
        $camat = Camat::where('user_id', $user->id)->first();
        
        if (!$camat) {
            return redirect()->route('home')->with('error', 'Data camat tidak ditemukan');
        }
        
        $search = $request->get('search');
        
        // Ambil desa-desa dari kecamatan camat
        $desas = $camat->kecamatan->desas()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orderBy('nama')
            ->paginate(10);
        
        return view('camat.desa.index', compact('desas', 'search', 'camat'));
    }
}