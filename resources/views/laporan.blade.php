@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- Laporan Penjualan Produk Setengah Jadi --}}
                <div class="card mb-4">
                    <div class="card-header">Laporan Penjualan Produk Setengah Jadi</div>
                    <div class="card-body">
                        <form action="{{ url('/laporan/show') }}" method="GET" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="periode">Pilih Periode</label>
                                        <input type="hidden" name="jenis" value="setengah_jadi">
                                        <select name="periode" class="form-control" required>
                                            <option value="">--Pilih Periode Laporan--</option>
                                            <option value="All">Semua</option>
                                            <option value="periode">Per Periode</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tglawal">Tanggal Awal</label>
                                        <input type="date" name="tglawal" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tglakhir">Tanggal Akhir</label>
                                        <input type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-success" value="Cetak Laporan">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                {{-- Laporan Penjualan Produksi Sendiri --}}
                <div class="card mb-4">
                    <div class="card-header">Laporan Penjualan Produksi Sendiri</div>
                    <div class="card-body">
                        <form action="{{ url('/laporan/show') }}" method="GET" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="periode">Pilih Periode</label>
                                        <input type="hidden" name="jenis" value="produksi_sendiri">
                                        <select name="periode" class="form-control" required>
                                            <option value="">--Pilih Periode Laporan--</option>
                                            <option value="All">Semua</option>
                                            <option value="periode">Per Periode</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tglawal">Tanggal Awal</label>
                                        <input type="date" name="tglawal" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tglakhir">Tanggal Akhir</label>
                                        <input type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-success" value="Cetak Laporan">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
             <div class="card mb-4"> 
                    <div class="card-header">Laporan Pengeluaran Kas</div>
                    <div class="card-body">
                        <form action="{{ url('/laporan/pengeluaran') }}" method="GET" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="periode">Pilih Periode</label>
                                        <input type="hidden" name="jenis" value="produksi_sendiri">
                                        <select name="periode" class="form-control" required>
                                            <option value="">--Pilih Periode Laporan--</option>
                                            <option value="All">Semua</option>
                                            <option value="periode">Per Periode</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tglawal">Tanggal Awal</label>
                                        <input type="date" name="tglawal" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tglakhir">Tanggal Akhir</label>
                                        <input type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-success" value="Cetak Laporan">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div> 

            </div>
        </div>
    </div>
@endsection
