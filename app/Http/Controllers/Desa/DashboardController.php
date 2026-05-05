<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display desa dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $desa = $user->usable;
        
        // Stats for kepala desa
        $stats = [
            'total_kegiatan' => $desa ? $desa->kegiatans->count() : 0,
            'kegiatan_akan_datang' => $desa ? $desa->kegiatans()->where('tanggal_mulai', '>', now())->count() : 0,
            'kegiatan_selesai' => $desa ? $desa->kegiatans()->where('status', 'completed')->count() : 0,
            'kegiatan_berlangsung' => $desa ? $desa->kegiatans()->where('status', 'ongoing')->count() : 0,
        ];
        
        // Recent activities
        $recentActivities = $desa 
            ? $desa->kegiatans()
                ->orderBy('tanggal_mulai', 'desc')
                ->limit(5)
                ->get()
            : collect();
        
        return view('desa.dashboard', compact('stats', 'recentActivities', 'desa'));
    }
}
