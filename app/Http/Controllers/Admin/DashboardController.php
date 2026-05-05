<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kegiatan;
use App\Models\Kecamatan;
use App\Models\KepalaDesa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_desa' => Desa::count(),
            'total_kecamatan' => Kecamatan::count(),
            'total_kepala_desa' => KepalaDesa::count(),
            'total_kegiatan' => Kegiatan::count(),
        ];

        $recentActivities = Kegiatan::with('desa')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentActivities'));
    }
}
