<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatans = [
            ['kode' => 'KC001', 'nama' => 'Kuala'],
            ['kode' => 'KC002', 'nama' => 'Makale'],
            ['kode' => 'KC003', 'nama' => 'Sangalla'],
            ['kode' => 'KC004', 'nama' => 'Simbuang'],
            ['kode' => 'KC005', 'nama' => 'Mappa'],
            ['kode' => 'KC006', 'nama' => 'Buntao'],
            ['kode' => 'KC007', 'nama' => 'Malimbong'],
            ['kode' => 'KC008', 'nama' => 'Pangala'],
            ['kode' => 'KC009', 'nama' => 'Kurra'],
        ];

        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create($kecamatan);
        }
    }
}
