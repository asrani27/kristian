<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $kegiatans = Kegiatan::with('desa.kecamatan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('jenis', 'like', '%' . $search . '%')
                             ->orWhere('lokasi', 'like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.kegiatan.index', compact('kegiatans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::with('kecamatan')->orderBy('nama')->get();
        return view('admin.kegiatan.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desa,id',
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan');
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
    public function edit(Kegiatan $kegiatan)
    {
        $desas = Desa::with('kecamatan')->orderBy('nama')->get();
        return view('admin.kegiatan.edit', compact('kegiatan', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desa,id',
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($kegiatan->foto && \Storage::disk('public')->exists($kegiatan->foto)) {
                \Storage::disk('public')->delete($kegiatan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        // Delete photo if exists
        if ($kegiatan->foto && \Storage::disk('public')->exists($kegiatan->foto)) {
            \Storage::disk('public')->delete($kegiatan->foto);
        }
        
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}
