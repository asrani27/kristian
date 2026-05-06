<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Kecamatan</title>

    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 14px;
        }

        .container {
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
            height: 120px;
        }

        .logo-container img {
            width: 100%;
            height: auto;
            max-height: 100px;
        }

        .header-content {
            margin-left: 100px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 20px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .header p {
            font-size: 12px;
            margin: 3px 0;
        }

        .line {
            border-top: 2px solid black;
            margin: 10px 0 20px 0;
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul h4 {
            margin: 0;
            font-size: 16px;
        }

        .info {
            margin-bottom: 15px;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        table th {
            font-weight: bold;
            font-size: 12px;
        }

        .ttd {
            width: 300px;
            float: right;
            margin-top: 40px;
            text-align: left;
        }

        .ttd p {
            margin: 3px 0;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <div class="logo-container"><img
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/kuala.png'))) }}"
                    width="80">
            </div>
            <div class="header-content">
                <h1>KECAMATAN MANDASTANA</h1>
                <h2>KABUPATEN BARITO KUALA</h2>
                <p>Jl. Desa Tabing Rimbah No 3 RT 7 Desa Tabing Rimbah Kecamatan Mandastana Kabupaten Barito Kuala
                    Kalimantan Selatan 70571
                </p>
            </div>

        </div>

        <div class="line"></div>

        <div class="judul">
            <h4>LAPORAN DATA KECAMATAN</h4>
        </div>

        <div class="info">
            <p>Tanggal Cetak: {{ $tanggal }}</p>
            <p>Total Data: {{ $kecamatans->count() }} Kecamatan</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%">No</th>
                    <th style="width: 15%">Kode</th>
                    <th style="width: 30%">Nama Kecamatan</th>
                    <th style="width: 30%">Alamat</th>
                    <th style="width: 20%">Akun</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kecamatans as $index => $kecamatan)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $kecamatan->kode ?? '-' }}</td>
                    <td>{{ $kecamatan->nama }}</td>
                    <td>{{ $kecamatan->alamat ?? '-' }}</td>
                    <td>
                        @if($kecamatan->user)
                        Aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data kecamatan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="ttd">
            <p>Tabing Rimbah, {{ now()->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,<br />
                Camat Mandastana</p>

            <br><br><br>

            <p><b>ST. KHADIJAH, M.Pd</b></p>
            <p>NIP. 19771205 200701 2 012</p>
        </div>

    </div>

</body>

</html>