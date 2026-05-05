<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $desa = $user->usable;
        
        if (!$desa) {
            return redirect()->route('desa.dashboard')->with('error', 'Data desa tidak ditemukan');
        }
        
        $search = $request->get('search');
        
        $kegiatans = Kegiatan::where('desa_id', $desa->id)
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('jenis', 'like', '%' . $search . '%')
                             ->orWhere('lokasi', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('desa.kegiatan.index', compact('kegiatans', 'search', 'desa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $desa = $user->usable;
        
        if (!$desa) {
            return redirect()->route('desa.dashboard')->with('error', 'Data desa tidak ditemukan');
        }
        
        return view('desa.kegiatan.create', compact('desa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $desa = $user->usable;
        
        if (!$desa) {
            return redirect()->route('desa.dashboard')->with('error', 'Data desa tidak ditemukan');
        }
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Force desa_id to the logged-in user's desa
        $validated['desa_id'] = $desa->id;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        Kegiatan::create($validated);

        return redirect()->route('desa.kegiatan.index')
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
        $user = Auth::user();
        $desa = $user->usable;
        
        if (!$desa) {
            return redirect()->route('desa.dashboard')->with('error', 'Data desa tidak ditemukan');
        }
        
        // Ensure the kegiatan belongs to the logged-in desa
        if ($kegiatan->desa_id !== $desa->id) {
            return redirect()->route('desa.kegiatan.index')
                ->with('error', 'Anda tidak memiliki akses ke kegiatan ini');
        }
        
        return view('desa.kegiatan.edit', compact('kegiatan', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $user = Auth::user();
        $desa = $user->usable;
        
        if (!$desa) {
            return redirect()->route('desa.dashboard')->with('error', 'Data desa tidak ditemukan');
        }
        
        // Ensure the kegiatan belongs to the logged-in desa
        if ($kegiatan->desa_id !== $desa->id) {
            return redirect()->route('desa.kegiatan.index')
                ->with('error', 'Anda tidak memiliki akses ke kegiatan ini');
        }
        
        $validated = $request->validate([
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

        return redirect()->route('desa.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $user = Auth::user();
        $desa = $user->usable;
        
        if (!$desa) {
            return redirect()->route('desa.dashboard')->with('error', 'Data desa tidak ditemukan');
        }
        
        // Ensure the kegiatan belongs to the logged-in desa
        if ($kegiatan->desa_id !== $desa->id) {
            return redirect()->route('desa.kegiatan.index')
                ->with('error', 'Anda tidak memiliki akses ke kegiatan ini');
        }
        
        // Delete photo if exists
        if ($kegiatan->foto && \Storage::disk('public')->exists($kegiatan->foto)) {
            \Storage::disk('public')->delete($kegiatan->foto);
        }
        
        $kegiatan->delete();

        return redirect()->route('desa.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}
