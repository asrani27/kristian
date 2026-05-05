<?php

namespace App\Http\Controllers\Camat;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display camat dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $camat = $user->usable;
        
        // Get kecamatan from camat's user relationship
        $kecamatan = $camat ? $camat->kecamatan : null;
        
        // Get desa under this kecamatan
        $desaIds = $kecamatan ? $kecamatan->desas->pluck('id') : [];
        
        // Stats for camat
        $stats = [
            'total_desa' => $kecamatan ? $kecamatan->desas->count() : 0,
            'total_kegiatan' => $kecamatan ? Kegiatan::whereIn('desa_id', $desaIds)->count() : 0,
            'kegiatan_akan_datang' => $kecamatan ? Kegiatan::whereIn('desa_id', $desaIds)->where('tanggal_mulai', '>', now())->count() : 0,
            'kegiatan_selesai' => $kecamatan ? Kegiatan::whereIn('desa_id', $desaIds)->where('status', 'completed')->count() : 0,
        ];
        
        // Recent activities
        $recentActivities = $kecamatan 
            ? Kegiatan::with('desa')
                ->whereIn('desa_id', $desaIds)
                ->orderBy('tanggal_mulai', 'desc')
                ->limit(5)
                ->get()
            : collect();
        
        return view('camat.dashboard', compact('stats', 'recentActivities', 'kecamatan'));
    }
}
