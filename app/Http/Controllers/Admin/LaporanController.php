<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Camat;
use App\Models\Desa;
use App\Models\KepalaDesa;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display the laporan index page
     */
    public function index()
    {
        return view('admin.laporan.index');
    }

    /**
     * Generate PDF for Kecamatan report
     */
    public function kecamatanPdf()
    {
        $kecamatans = Kecamatan::with('user')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.kecamatan', [
            'kecamatans' => $kecamatans,
            'title' => 'Laporan Data Kecamatan',
            'tanggal' => now()->format('d/m/Y'),
        ]);

        $pdf->setPaper('A4', 'potrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->stream('laporan_kecamatan_' . date('d-m-Y') . '.pdf');
    }

    /**
     * Generate PDF for Camat report
     */
    public function camatPdf()
    {
        $camats = Camat::with('kecamatan')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.camat', [
            'camats' => $camats,
            'title' => 'Laporan Data Camat',
            'tanggal' => now()->format('d/m/Y'),
        ]);

        $pdf->setPaper('A4', 'potrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->stream('laporan_camat_' . date('d-m-Y') . '.pdf');
    }

    /**
     * Generate PDF for Desa report
     */
    public function desaPdf()
    {
        $desas = Desa::with('kecamatan')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.desa', [
            'desas' => $desas,
            'title' => 'Laporan Data Desa',
            'tanggal' => now()->format('d/m/Y'),
        ]);

        $pdf->setPaper('A4', 'potrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->stream('laporan_desa_' . date('d-m-Y') . '.pdf');
    }

    /**
     * Generate PDF for Kepala Desa report
     */
    public function kepalaDesaPdf()
    {
        $kepalaDesas = KepalaDesa::with('desa.kecamatan')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.kepala_desa', [
            'kepalaDesas' => $kepalaDesas,
            'title' => 'Laporan Data Kepala Desa',
            'tanggal' => now()->format('d/m/Y'),
        ]);

        $pdf->setPaper('A4', 'potrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->stream('laporan_kepala_desa_' . date('d-m-Y') . '.pdf');
    }

    /**
     * Generate PDF for Kegiatan report by date range
     */
    public function kegiatanPdf(Request $request)
    {
        $query = Kegiatan::with('desa.kecamatan');

        // Filter by tanggal mulai and tanggal selesai if provided
        if ($request->has('tanggal_mulai') && $request->tanggal_mulai) {
            $query->whereDate('tanggal_mulai', '>=', $request->tanggal_mulai);
        }

        if ($request->has('tanggal_selesai') && $request->tanggal_selesai) {
            $query->whereDate('tanggal_mulai', '<=', $request->tanggal_selesai);
        }

        $kegiatans = $query->orderBy('tanggal_mulai', 'desc')->get();

        // Build periode label for display
        $tanggalMulai = $request->tanggal_mulai ?? null;
        $tanggalSelesai = $request->tanggal_selesai ?? null;

        if ($tanggalMulai && $tanggalSelesai) {
            $periode = \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') . ' - ' . \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y');
        } elseif ($tanggalMulai) {
            $periode = 'Dari ' . \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y');
        } elseif ($tanggalSelesai) {
            $periode = 'Sampai ' . \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y');
        } else {
            $periode = 'Semua Periode';
        }

        $pdf = Pdf::loadView('admin.laporan.pdf.kegiatan', [
            'kegiatans' => $kegiatans,
            'title' => 'Laporan Data Kegiatan',
            'tanggal' => now()->format('d/m/Y'),
            'periode' => $periode,
        ]);

        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        $filename = 'laporan_kegiatan_' . date('d-m-Y') . '.pdf';

        return $pdf->stream($filename);
    }
}
