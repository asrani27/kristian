<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desas = [
            [
                'kode' => 'DS001',
                'nama' => 'Desa Kuala',
                'alamat' => 'Jl. Poros Kuala No. 1, Kecamatan Kuala, Kabupaten Tana Toraja',
                'kecamatan_id' => 1,
            ],
            [
                'kode' => 'DS002',
                'nama' => 'Desa Buntu',
                'alamat' => 'Jl. Buntu No. 2, Kecamatan Kuala, Kabupaten Tana Toraja',
                'kecamatan_id' => 1,
            ],
            [
                'kode' => 'DS003',
                'nama' => 'Desa Rante',
                'alamat' => 'Jl. Rante No. 3, Kecamatan Kuala, Kabupaten Tana Toraja',
                'kecamatan_id' => 1,
            ],
            [
                'kode' => 'DS004',
                'nama' => 'Desa Makale',
                'alamat' => 'Jl. Makale No. 4, Kecamatan Makale, Kabupaten Tana Toraja',
                'kecamatan_id' => 2,
            ],
            [
                'kode' => 'DS005',
                'nama' => 'Desa Rumbai',
                'alamat' => 'Jl. Rumbai No. 5, Kecamatan Makale, Kabupaten Tana Toraja',
                'kecamatan_id' => 2,
            ],
            [
                'kode' => 'DS006',
                'nama' => 'Desa Sangalla',
                'alamat' => 'Jl. Sangalla No. 6, Kecamatan Sangalla, Kabupaten Tana Toraja',
                'kecamatan_id' => 3,
            ],
            [
                'kode' => 'DS007',
                'nama' => 'Desa Simbuang',
                'alamat' => 'Jl. Simbuang No. 7, Kecamatan Simbuang, Kabupaten Tana Toraja',
                'kecamatan_id' => 4,
            ],
            [
                'kode' => 'DS008',
                'nama' => 'Desa Mappa',
                'alamat' => 'Jl. Mappa No. 8, Kecamatan Mappa, Kabupaten Tana Toraja',
                'kecamatan_id' => 5,
            ],
            [
                'kode' => 'DS009',
                'nama' => 'Desa Buntao',
                'alamat' => 'Jl. Buntao No. 9, Kecamatan Buntao, Kabupaten Tana Toraja',
                'kecamatan_id' => 6,
            ],
            [
                'kode' => 'DS010',
                'nama' => 'Desa Malimbong',
                'alamat' => 'Jl. Malimbong No. 10, Kecamatan Malimbong, Kabupaten Tana Toraja',
                'kecamatan_id' => 7,
            ],
            [
                'kode' => 'DS011',
                'nama' => 'Desa Pangala',
                'alamat' => 'Jl. Pangala No. 11, Kecamatan Pangala, Kabupaten Tana Toraja',
                'kecamatan_id' => 8,
            ],
            [
                'kode' => 'DS012',
                'nama' => 'Desa Kurra',
                'alamat' => 'Jl. Kurra No. 12, Kecamatan Kurra, Kabupaten Tana Toraja',
                'kecamatan_id' => 9,
            ],
        ];

        foreach ($desas as $desa) {
            Desa::create($desa);
        }
    }
}
