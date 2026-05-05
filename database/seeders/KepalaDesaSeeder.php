<?php

namespace Database\Seeders;

use App\Models\KepalaDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KepalaDesaSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kepalaDesas = [
            [
                'nik' => '7304014501750001',
                'nama' => 'Andi Saputra',
                'status' => 'aktif',
                'tanggal_menjabat' => '2021-08-01',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Poros Kuala No. 1, Desa Kuala, Kecamatan Kuala',
                'desa_id' => 1,
            ],
            [
                'nik' => '7304015202850002',
                'nama' => 'Muhammad Yusuf',
                'status' => 'aktif',
                'tanggal_menjabat' => '2020-07-15',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Buntu No. 2, Desa Buntu, Kecamatan Kuala',
                'desa_id' => 2,
            ],
            [
                'nik' => '7304016303900003',
                'nama' => 'Siti Aminah',
                'status' => 'aktif',
                'tanggal_menjabat' => '2022-01-10',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Rante No. 3, Desa Rante, Kecamatan Kuala',
                'desa_id' => 3,
            ],
            [
                'nik' => '7304024501800004',
                'nama' => 'Baharuddin',
                'status' => 'aktif',
                'tanggal_menjabat' => '2019-06-20',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Makale No. 4, Desa Makale, Kecamatan Makale',
                'desa_id' => 4,
            ],
            [
                'nik' => '7304025102860005',
                'nama' => 'Hasan Basri',
                'status' => 'aktif',
                'tanggal_menjabat' => '2021-03-05',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Rumbai No. 5, Desa Rumbai, Kecamatan Makale',
                'desa_id' => 5,
            ],
            [
                'nik' => '7304034201750006',
                'nama' => 'Jusuf Lolo',
                'status' => 'aktif',
                'tanggal_menjabat' => '2020-11-01',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Sangalla No. 6, Desa Sangalla, Kecamatan Sangalla',
                'desa_id' => 6,
            ],
            [
                'nik' => '7304045501900007',
                'nama' => 'Patta Roa',
                'status' => 'aktif',
                'tanggal_menjabat' => '2022-05-15',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Simbuang No. 7, Desa Simbuang, Kecamatan Simbuang',
                'desa_id' => 7,
            ],
            [
                'nik' => '7304054801820008',
                'nama' => 'Andi Materu',
                'status' => 'aktif',
                'tanggal_menjabat' => '2018-09-01',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Mappa No. 8, Desa Mappa, Kecamatan Mappa',
                'desa_id' => 8,
            ],
            [
                'nik' => '7304065202840009',
                'nama' => 'Bastian Tandi',
                'status' => 'demisioner',
                'tanggal_menjabat' => '2015-08-20',
                'tanggal_demisioner' => '2021-08-19',
                'alamat' => 'Jl. Buntao No. 9, Desa Buntao, Kecamatan Buntao',
                'desa_id' => 9,
            ],
            [
                'nik' => '7304066003910010',
                'nama' => 'Paterick Pali',
                'status' => 'aktif',
                'tanggal_menjabat' => '2021-08-20',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Buntao No. 9, Desa Buntao, Kecamatan Buntao',
                'desa_id' => 9,
            ],
            [
                'nik' => '7304074301780011',
                'nama' => 'Semmy Langi',
                'status' => 'aktif',
                'tanggal_menjabat' => '2020-02-14',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Malimbong No. 10, Desa Malimbong, Kecamatan Malimbong',
                'desa_id' => 10,
            ],
            [
                'nik' => '7304085502870012',
                'nama' => 'Ruslan Tallung',
                'status' => 'aktif',
                'tanggal_menjabat' => '2022-07-01',
                'tanggal_demisioner' => null,
                'alamat' => 'Jl. Pangala No. 11, Desa Pangala, Kecamatan Pangala',
                'desa_id' => 11,
            ],
        ];

        foreach ($kepalaDesas as $kepalaDesa) {
            KepalaDesa::create($kepalaDesa);
        }
    }
}
