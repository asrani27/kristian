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
        $periodes = Kegiatan::selectRaw('YEAR(tanggal_mulai) as tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('admin.laporan.index', compact('periodes'));
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
     * Generate PDF for Kegiatan report by period
     */
    public function kegiatanPdf(Request $request)
    {
        $query = Kegiatan::with('desa.kecamatan');

        // Filter by periode if selected
        if ($request->has('periode') && $request->periode) {
            $query->whereYear('tanggal_mulai', $request->periode);
        }

        $kegiatans = $query->orderBy('tanggal_mulai', 'desc')->get();
        $periode = $request->periode ?? 'Semua Periode';

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

        $filename = $request->periode
            ? 'laporan_kegiatan_' . $request->periode . '_' . date('d-m-Y') . '.pdf'
            : 'laporan_kegiatan_semua_' . date('d-m-Y') . '.pdf';

        return $pdf->stream($filename);
    }
}
