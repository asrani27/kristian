<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\KepalaDesa;
use Illuminate\Http\Request;

class KepalaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $kepalaDesas = KepalaDesa::with('desa.kecamatan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('nik', 'like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.kepala_desa.index', compact('kepalaDesas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::with('kecamatan')->orderBy('nama')->get();
        return view('admin.kepala_desa.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:20|unique:kepala_desa,nik',
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif,demuan',
            'tanggal_menjabat' => 'required|date',
            'tanggal_demisioner' => 'nullable|date|after:tanggal_menjabat',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desa_id' => 'required|exists:desa,id',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kepala-desa', 'public');
        }

        KepalaDesa::create($validated);

        return redirect()->route('admin.kepala-desa.index')
            ->with('success', 'Kepala Desa berhasil ditambahkan');
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
    public function edit(KepalaDesa $kepalaDesa)
    {
        $desas = Desa::with('kecamatan')->orderBy('nama')->get();
        return view('admin.kepala_desa.edit', compact('kepalaDesa', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KepalaDesa $kepalaDesa)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:20|unique:kepala_desa,nik,' . $kepalaDesa->id,
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif,demuan',
            'tanggal_menjabat' => 'required|date',
            'tanggal_demisioner' => 'nullable|date|after:tanggal_menjabat',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desa_id' => 'required|exists:desa,id',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($kepalaDesa->foto && \Storage::disk('public')->exists($kepalaDesa->foto)) {
                \Storage::disk('public')->delete($kepalaDesa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('kepala-desa', 'public');
        }

        $kepalaDesa->update($validated);

        return redirect()->route('admin.kepala-desa.index')
            ->with('success', 'Kepala Desa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KepalaDesa $kepalaDesa)
    {
        // Delete photo if exists
        if ($kepalaDesa->foto && \Storage::disk('public')->exists($kepalaDesa->foto)) {
            \Storage::disk('public')->delete($kepalaDesa->foto);
        }
        
        $kepalaDesa->delete();

        return redirect()->route('admin.kepala-desa.index')
            ->with('success', 'Kepala Desa berhasil dihapus');
    }
}
