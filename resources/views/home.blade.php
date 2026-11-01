@extends('layouts.layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border text-black">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Anda Telah Login Ke Dalam SIMARA (Sistem Informasi Manajemen Aruna Batik Nusantara)
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class = "row">

        </div>
        <div class="row" style="margin-top: 20px;">

            <div style="width: 50%">
                <h3 style="text-align: center">Penjualan Produksi Sendiri</h3>
                <canvas id="chartProduksiSendiri"></canvas>
            </div>
            <div style="width: 50%">
                <h3 style="text-align: center">Penjualan Setengah Jadi</h3>
                <canvas id="chartSetengahJadi"></canvas>
            </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <div class="card-body">
                <div style="width: 100%; position: relative">
                    <b>
                        <h3 style="text-align: center ">Stok Barang Produksi Sendiri</h3>
                    </b>
                    <a href="{{ url('/Psendiri') }}" class=""
                        style="position: absolute; right: 0; top: 0px; background-color: rgb(97, 170, 215); color: white; padding: 5px; border-radius: 5px; padding-left: 10px; padding-right: 10px">Lihat
                        Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr style="background-color: #95833242" align    ="center">
                                <th>Nama Produk</th>
                                <th>Motif</th>
                                <th>Jenis Kain</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produksi as $prod)
                                <tr>
                                    <td>{{ $prod->nama_produk }}</td>
                                    {{-- <td>{{ $prod->motif->nama }}</td> --}}
                                    <td>{{ $prod->motif ? $prod->motif->nama : '-' }}</td>
                                    <td>{{ $prod->JenisKain->nama }}</td> <!-- Sesuai dengan nama relasi di model -->
                                    <td>{{ $prod->ukuran->ukuran }}</td>
                                    <!-- karena field-nya di model Ukuran adalah 'ukuran' bukan 'nama' -->
                                    <td>{{ $prod->stok }}</td>
                                    <td>Rp {{ number_format($prod->harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <div class="card-body">
                <div style="width: 100%; position: relative">
                    <b>
                        <h3 style="text-align: center ">Stok Barang Produksi Setengah Jadi</h3>
                    </b>
                    <a href="{{ url('/Sjadi') }}" class=""
                        style="position: absolute; right: 0; top: 0px; background-color: rgb(97, 170, 215); color: white; padding: 5px; border-radius: 5px; padding-left: 10px; padding-right: 10px">Lihat
                        Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr style="background-color: #95833242" align    ="center">
                                <th>Nama Produk</th>
                                <th>Motif</th>
                                <th>Jenis Kain</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($setengah as $set)
                                <tr>
                                    <td>{{ $set->nama_produk }}</td>
                                    <td>{{ $prod->motif ? $prod->motif->nama : '-' }}</td>
                                    {{-- <td>{{ $set->motif->nama }}</td> --}}
                                    <td>{{ $set->JenisKain->nama }}</td> <!-- Sesuai dengan nama relasi di model -->
                                    <td>{{ $set->ukuran->ukuran }}</td>
                                    <!-- karena field-nya di model Ukuran adalah 'ukuran' bukan 'nama' -->
                                    <td>{{ $set->stok }}</td>
                                    <td>Rp {{ number_format($prod->harga, 0, ',', '.') }}</td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            fetch('/api/chart-data') // Ganti sesuai rute API Laravel kamu
                .then(response => response.json())
                .then(data => {
                    // Ambil dan siapkan data produksi sendiri
                    const labelProduksi = data.produksi_sendiri.map(item => item.bulan);
                    const dataProduksi = data.produksi_sendiri.map(item => item.total);

                    // Ambil dan siapkan data setengah jadi
                    const labelSetengah = data.setengah_jadi.map(item => item.bulan);
                    const dataSetengah = data.setengah_jadi.map(item => item.total);

                    // Chart untuk Produksi Sendiri
                    new Chart(document.getElementById('chartProduksiSendiri').getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labelProduksi,
                            datasets: [{
                                label: 'Jumlah Terjual',
                                data: dataProduksi,
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Penjualan Produksi Sendiri per Bulan'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Item'
                                    }
                                }
                            }
                        }
                    });

                    // Chart untuk Setengah Jadi
                    new Chart(document.getElementById('chartSetengahJadi').getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labelSetengah,
                            datasets: [{
                                label: 'Jumlah Terjual',
                                data: dataSetengah,
                                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Penjualan Setengah Jadi per Bulan'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Item'
                                    }
                                }
                            }
                        }
                    });
                });
        </script>

        {{-- <div class="row" style="margin-top: 20px;">
            <div style="width: 50%">
                <h3 style="text-align: center">Stok Barang Produksi Sendiri</h3>
                <canvas id="barangProduksiSendiri" height="150"></canvas>
            </div>
            <div style="width: 50%">
                <h3 style="text-align: center">Stok Barang Setengah Jadi</h3>
                <canvas id="barangSetengahJadi" height="150"></canvas>
            </div>
        </div> --}}

        <script>
            fetch('/api/stok-chart')
                .then(response => response.json())
                .then(data => {
                    // Produksi Sendiri
                    const labelProduksi = data.produksi_sendiri.map(item => item.nama_produk);
                    const dataProduksi = data.produksi_sendiri.map(item => item.stok);

                    new Chart(document.getElementById('barangProduksiSendiri').getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labelProduksi,
                            datasets: [{
                                label: 'Stok Produksi Sendiri',
                                data: dataProduksi,
                                backgroundColor: 'rgba(75, 192, 192, 0.7)'
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Stok Produk - Produksi Sendiri'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Stok'
                                    }
                                }
                            }
                        }
                    });

                    // Setengah Jadi
                    const labelSetengah = data.setengah_jadi.map(item => item.nama_produk);
                    const dataSetengah = data.setengah_jadi.map(item => item.stok);

                    new Chart(document.getElementById('barangSetengahJadi').getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labelSetengah,
                            datasets: [{
                                label: 'Stok Setengah Jadi',
                                data: dataSetengah,
                                backgroundColor: 'rgba(255, 99, 132, 0.7)'
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Stok Produk - Setengah Jadi'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Stok'
                                    }
                                }
                            }
                        }
                    });
                });
        </script>
        <script>
            fetch('/api/chart-data') // Ganti sesuai rute API Laravel kamu
                .then(response => response.json())
                .then(data => {
                    // Ambil dan siapkan data produksi sendiri
                    const labelProduksi = data.produksi_sendiri.map(item => item.bulan);
                    const dataProduksi = data.produksi_sendiri.map(item => item.total);

                    // Ambil dan siapkan data setengah jadi
                    const labelSetengah = data.setengah_jadi.map(item => item.bulan);
                    const dataSetengah = data.setengah_jadi.map(item => item.total);

                    // Chart untuk Produksi Sendiri
                    new Chart(document.getElementById('chartProduksiSendiri').getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labelProduksi,
                            datasets: [{
                                label: 'Jumlah Transaksi', // PERBAIKAN: Label diubah dari 'Jumlah Terjual'
                                data: dataProduksi,
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Transaksi Penjualan Produksi Sendiri per Bulan' // PERBAIKAN: Title diubah
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Transaksi' // PERBAIKAN: Label Y-axis diubah
                                    }
                                }
                            }
                        }
                    });

                    // Chart untuk Setengah Jadi
                    new Chart(document.getElementById('chartSetengahJadi').getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: labelSetengah,
                            datasets: [{
                                label: 'Jumlah Transaksi', // PERBAIKAN: Label diubah dari 'Jumlah Terjual'
                                data: dataSetengah,
                                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Transaksi Penjualan Setengah Jadi per Bulan' // PERBAIKAN: Title diubah
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Transaksi' // PERBAIKAN: Label Y-axis diubah
                                    }
                                }
                            }
                        }
                    });
                });
        </script>
    </div>
@endsection
