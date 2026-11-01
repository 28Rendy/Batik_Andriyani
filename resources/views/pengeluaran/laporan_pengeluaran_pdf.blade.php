{{-- <!DOCTYPE html>
<html>

<head>
    <title>Laporan Produksi Sendiri</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Laporan Produksi Sendiri</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Jumlah Item</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->tanggal_penjualan }}</td>
                    <td>{{ $row->nama_pelanggan }}</td>
                    <td>{{ $row->nama_produk }}</td>
                    <td>{{ $row->jumlah_item }}</td>
                    <td>{{ number_format($row->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ $row->status_pembayaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}



<!DOCTYPE html>
<html>

<head>
    <title>Laporan Produksi Sendiri</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            position: relative;

        }

        .garis {
            position: relative;
            bottom: 0px
        }

        .header {
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            position: relative;

        }

        .logo {
            width: 100px;
            height: 100px;
            position: absolute;
        }

        .company-info {
            flex-grow: 1;
            text-align: right;
        }

        .company-name {
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 5px;
            font-family: fantasy;
        }

        .company-details {
            font-size: 14px;
            color: #555;
            line-height: 1.5;
        }

        .report-title {
            text-align: center;
            margin: 20px 0;
            font-size: 18px;
            font-weight: 900;
            text-decoration: underline;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #c8c8c8;
            font-weight: bold;
            text-align: center;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Ganti src dengan path logo perusahaan Anda -->

        <img src="asset/img/logo_batik.png" alt="Logo Perusahaan" class="logo">
        <div class="company-info">

            <div class="company-name">ARUNA BATIK NUSANTARA</div>
            <div class="company-details">
                Alamat: Jl. Gajah Mada No. 88, Tegal Barat, Kota Tegal, Jawa Tengah 52113<br>
                WhatsApp: +62 812-3456-7890<br>
                Email: kontak@arunabatik.com
            </div>
        </div>
    </div>

    <div class="report-title">
        LAPORAN PENGELUARAN KAS
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Metode Pembayaran</th>
                <th>Penerima</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->metode_pembayaran }}</td>
                    <td>{{ $row->penerima }}</td>
                    <td>{{ number_format($row->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td style="font-weight: bold;text-align: center" colspan="6" align="right">Jumlah Total Bayar</td>
                <td style="font-weight: bold;">{{ number_format(collect($data)->sum('total'), 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
    <div class="footer">
        Laporan ini dicetak pada: {{ date('d F Y ') }}
    </div>
    <div class="garis">
        <hr>
        </hr>
    </div>
</body>

</html>
