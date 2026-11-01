@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content=""> <title>Register SIMARA</title>
        <!-- Custom fonts for this template-->
        <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Custom styles for this template-->
        <link href="{{ asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-light">{{ __('Register') }}</div>

                <div class="card-body text-dark">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">SIMARA<br>Sistem Informasi Manajemen Aruna Batik Nusantara<br>
                            <br><img src="{{ asset('asset/img/logo_okwan.png')}}" width="160"></h1>
                        </div>
    <fieldset>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="form-control" required>
            </div>
            <div class="col-md-5"> 
                <label for="nama">Nama Lengkap</label>
                <input id="nama" type="text" name="nama" class="form-control" required>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="roles">Roles</label>
                <select id="roles" name="roles[]" class="form-control" required>
                    <option value="">--Pilih Roles--</option> 
                
                    <option value="STAFF">Staff</option>
                </select>
            </div>
            <div class="col-md-5"> 
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" required>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="address">Alamat</label>
                <textarea id="address" name="address" class="form-control" required></textarea>
            </div>
            <div class="col-md-5"> 
                <label for="phone">Nomor Telpon</label>
                <input id="phone" type="text" name="phone" class="form-control" required>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-5">
                <label for="kpassw">Konfirm Password</label>
                <input id="kpassw" type="password" name="kpassw" class="form-control" required>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">--Pilih Status--</option> 
                    <option value="ACTIVE">AKTIF</option>
                    <option value="INACTIVE">NON AKTIF</option>
                </select>
            </div>
                <div class="col-md-5"> 
                    <label for="nama_ibu">Nama Ibu</label>
                    <input id="nama_ibu" type="text" name="nama_ibu" class="form-control" required>
                </div>
        </div>
    
 
        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Register" href="http://localhost:8000/login" > 
            <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
        </div>
        <hr>
    </fieldset>
</form>
@endsection