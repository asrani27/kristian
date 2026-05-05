<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil kegiatan terbaru (limit 6)
        $kegiatans = Kegiatan::with('desa')
            ->latest()
            ->take(6)
            ->get();
        
        // Ambil featured kegiatan (yang terbaru)
        $featured = Kegiatan::with('desa')->latest()->first();
        
        // Hitung total kegiatan
        $totalKegiatan = Kegiatan::count();
        
        return view('home', compact('kegiatans', 'featured', 'totalKegiatan'));
    }
    
    public function detail($id)
    {
        $kegiatan = Kegiatan::with('desa')->findOrFail($id);
        
        // Ambil kegiatan terkait (kecuali yang sedang dilihat)
        $relatedKegiatans = Kegiatan::with('desa')
            ->where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();
        
        return view('kegiatan.detail', compact('kegiatan', 'relatedKegiatans'));
    }
}
