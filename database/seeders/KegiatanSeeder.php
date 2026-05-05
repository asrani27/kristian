<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatans = [
            [
                'desa_id' => 1,
                'nama' => 'Gotong Royong Pembersihan Sungai',
                'jenis' => 'Kebersihan',
                'tanggal_mulai' => '2026-04-01',
                'tanggal_selesai' => '2026-04-01',
                'deskripsi' => 'Kegiatan gotong royong membersihkan sungai yang melintasi Desa Kuala untuk mencegah banjir dan menjaga kebersihan lingkungan.',
                'alamat' => 'Sungai Kuala, Desa Kuala, Kecamatan Kuala',
                'lokasi' => 'Kuala',
            ],
            [
                'desa_id' => 2,
                'nama' => 'Pelatihan Keterampilan Pertanian Modern',
                'jenis' => 'Pendidikan',
                'tanggal_mulai' => '2026-03-15',
                'tanggal_selesai' => '2026-03-17',
                'deskripsi' => 'Pelatihan tentang teknik pertanian modern dan penggunaan alat-alat pertanian untuk meningkatkan hasil panen warga.',
                'alamat' => 'Balai Desa Buntu, Desa Buntu, Kecamatan Kuala',
                'lokasi' => 'Buntu',
            ],
            [
                'desa_id' => 3,
                'nama' => 'Posyandu Balita dan Ibu Hamil',
                'jenis' => 'Kesehatan',
                'tanggal_mulai' => '2026-04-05',
                'tanggal_selesai' => '2026-04-05',
                'deskripsi' => 'Pemeriksaan kesehatan rutin untuk balita dan ibu hamil meliputi pengukuran berat badan, tinggi badan, dan pemberian vitamin.',
                'alamat' => 'Pos Kesehatan Desa Rante, Desa Rante, Kecamatan Kuala',
                'lokasi' => 'Rante',
            ],
            [
                'desa_id' => 4,
                'nama' => 'Pembangunan Jalan Desa',
                'jenis' => 'Infrastruktur',
                'tanggal_mulai' => '2026-02-01',
                'tanggal_selesai' => '2026-03-30',
                'deskripsi' => 'Pembangunan jalan desa sepanjang 500 meter untuk memperlancar akses transportasi warga ke pusat desa.',
                'alamat' => 'Jalan Poros Makale, Desa Makale, Kecamatan Makale',
                'lokasi' => 'Makale',
            ],
            [
                'desa_id' => 5,
                'nama' => 'Kerajinan Tangan Lokal',
                'jenis' => 'Ekonomi',
                'tanggal_mulai' => '2026-03-01',
                'tanggal_selesai' => '2026-03-28',
                'deskripsi' => 'Pelatihan pembuatan kerajinan tangan dari bahan lokal seperti anyaman rotan dan bamboo untuk meningkatkan ekonomi warga.',
                'alamat' => 'Balai Budaya Desa Rumbai, Desa Rumbai, Kecamatan Makale',
                'lokasi' => 'Rumbai',
            ],
            [
                'desa_id' => 6,
                'nama' => 'Festival Adat Tongkonan',
                'jenis' => 'Budaya',
                'tanggal_mulai' => '2026-04-10',
                'tanggal_selesai' => '2026-04-12',
                'deskripsi' => 'Festival budaya untuk melestarikan adat istiadat Tongkonan meliputi tarian tradisional, upacara adat, dan pameran budaya.',
                'alamat' => 'Taman Budaya Sangalla, Desa Sangalla, Kecamatan Sangalla',
                'lokasi' => 'Sangalla',
            ],
            [
                'desa_id' => 7,
                'nama' => 'Vaksinasi Hewan Ternak',
                'jenis' => 'Kesehatan',
                'tanggal_mulai' => '2026-03-20',
                'tanggal_selesai' => '2026-03-22',
                'deskripsi' => 'Vaksinasi gratis untuk hewan ternak milik warga untuk mencegah penyakit mulut dan kuku (PMK).',
                'alamat' => 'Kantor Desa Simbuang, Desa Simbuang, Kecamatan Simbuang',
                'lokasi' => 'Simbuang',
            ],
            [
                'desa_id' => 8,
                'nama' => 'Penghijauan Reboisasi',
                'jenis' => 'Lingkungan',
                'tanggal_mulai' => '2026-04-15',
                'tanggal_selesai' => '2026-04-20',
                'deskripsi' => 'Penanaman 1000 pohon di area perbukitan untuk mencegah erosi dan menjaga kelestarian lingkungan.',
                'alamat' => 'Area Perbukitan Mappa, Desa Mappa, Kecamatan Mappa',
                'lokasi' => 'Mappa',
            ],
            [
                'desa_id' => 9,
                'nama' => 'Kelas Mengaji untuk Anak-anak',
                'jenis' => 'Pendidikan',
                'tanggal_mulai' => '2026-01-15',
                'tanggal_selesai' => '2026-04-15',
                'deskripsi' => 'Kelas mengaji rutin setiap minggu untuk anak-anak usia 7-12 tahun untuk mempelajari Al-Quran.',
                'alamat' => 'Masjid Al-Muttaqin, Desa Buntao, Kecamatan Buntao',
                'lokasi' => 'Buntao',
            ],
            [
                'desa_id' => 10,
                'nama' => 'Pameran Produk Unggulan Desa',
                'jenis' => 'Ekonomi',
                'tanggal_mulai' => '2026-04-25',
                'tanggal_selesai' => '2026-04-27',
                'deskripsi' => 'Pameran untuk memamerkan dan menjual produk unggulan desa seperti kopi, kakao, dan kerajinan tangan.',
                'alamat' => 'Gor Desa Malimbong, Desa Malimbong, Kecamatan Malimbong',
                'lokasi' => 'Malimbong',
            ],
            [
                'desa_id' => 11,
                'nama' => 'Pembersihan Sampah Pasar',
                'jenis' => 'Kebersihan',
                'tanggal_mulai' => '2026-04-08',
                'tanggal_selesai' => '2026-04-08',
                'deskripsi' => 'Kegiatan bersih-bersih pasar tradisional untuk menjaga kebersihan dan kenyamanan pengunjung pasar.',
                'alamat' => 'Pasar Tradisional Pangala, Desa Pangala, Kecamatan Pangala',
                'lokasi' => 'Pangala',
            ],
            [
                'desa_id' => 12,
                'nama' => 'Seminar Kewirausahaan Pemuda',
                'jenis' => 'Pendidikan',
                'tanggal_mulai' => '2026-04-18',
                'tanggal_selesai' => '2026-04-18',
                'deskripsi' => 'Seminar untuk memberikan motivasi dan pengetahuan kewirausahaan kepada pemuda desa.',
                'alamat' => 'Balai Desa Kurra, Desa Kurra, Kecamatan Kurra',
                'lokasi' => 'Kurra',
            ],
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}
