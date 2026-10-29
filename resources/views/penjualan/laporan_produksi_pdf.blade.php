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
            font-size: 12px; /* Diperkecil untuk muat lebih banyak kolom */
        }

        th {
            background-color: #c8c8c8;
            font-weight: bold;
            text-align: center;
        }

        /* Pengaturan lebar kolom */
        .col-tanggal { width: 12%; }
        .col-pelanggan { width: 18%; }
        .col-kode { width: 12%; }
        .col-produk { width: 20%; }
        .col-jumlah { width: 8%; }
        .col-status { width: 12%; }
        .col-total { width: 18%; }

        /* Alignment khusus */
        .text-left { text-align: left !important; }
        .text-right { text-align: right !important; }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
            color: #666;
        }

        /* Responsive untuk print */
        @media print {
            body {
                margin: 0;
                padding: 10px;
            }
            
            table {
                font-size: 10px;
            }
            
            th, td {
                padding: 4px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="asset/img/logo_batik.png" alt="Logo Perusahaan" class="logo">
        <div class="company-info">
            <div class="company-name">ANDRIYANI BATIK TEGAL</div>
            <div class="company-details">
                Alamat: Jl. Bengle Kidul, Bengle, Kec. Talang, Kabupaten Tegal, Jawa Tengah 52193<br>
                WhatsApp: +62 853-8551-3443<br>
                Email: andriyanibatik46@gmail.com
            </div>
        </div>
    </div>

    <div class="report-title">
        @if ($produkType === 'produksi_sendiri')
            <b>LAPORAN PRODUKSI SENDIRI</b>
        @else
            <b>LAPORAN PRODUKSI SETENGAH JADI</b>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-tanggal">Tanggal</th>
                <th class="col-pelanggan">Nama Pelanggan</th>
                <th class="col-kode">Kode Produk</th>
                <th class="col-produk">Nama Produk</th>
                <th class="col-jumlah">Jumlah Item</th>
                <th class="col-status">Status</th>
                <th class="col-total">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->tanggal_penjualan }}</td>
                    <td class="text-left">{{ $row->nama_pelanggan }}</td>
                    <td>{{ $row->kode_produk ?? '-' }}</td>
                    <td class="text-left">{{ $row->nama_produk }}</td>
                    <td>{{ $row->jumlah_item }}</td>
                    <td>{{ ucfirst($row->status_pembayaran) }}</td>
                    <td class="text-right">Rp {{ number_format($row->total_bayar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td style="font-weight: bold; text-align: center;" colspan="6">Jumlah Total Bayar</td>
                <td style="font-weight: bold; text-align: right;">
                    Rp {{ number_format(collect($data)->sum('total_bayar'), 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Laporan ini dicetak pada: {{ date('d F Y') }}
    </div>
    <div class="garis">
        <hr>
    </div>
</body>

</html>