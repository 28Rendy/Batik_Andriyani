 @extends('layouts.layout')

@section('content')
<form action="{{route('user.update', [$user->id])}}" method="POST"> 
@csrf
    <input type="hidden" name="_method" value="PUT"> 
    <fieldset> 
        <legend>Edit Data Pengguna</legend> 
        <div class="form-group row "> 
            <div class="col-md-5"> 
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="form-control" value="{{$user->username}}">
            </div>
            <div class="col-md-5"> 
                <label for="nama">Nama Lengkap</label>
                <input id="nama" type="text" name="nama" class="form-control" value="{{$user->nama}}">
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="roles">Roles</label>
                <select id="roles" name="roles[]" class="form-control" required>
                    <option value="">--Pilih Roles--</option> 
                    <option value="PEMILIK">Pemilik</option>
                    <option value="STAFF">Staff</option>
                </select>
            </div>
            <div class="col-md-5"> 
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="address">Alamat</label>
                <textarea id="address" name="address" class="form-control" value="{{$user->address}}">{{$user->address}}</textarea> 
            </div>
            <div class="col-md-5"> 
                <label for="phone">Nomor Telpon</label> 
                <input id="phone" type="text" name="phone" class="form-control" value="{{$user->phone}}">
            </div>
        </div>
        {{-- <div class="col-md-10">
            <input type="checkbox" name="ubahpass" value="ubah" > Ubah Password
        </div> --}}
        {{-- <div class="form-group row">
            <div class="col-md-5"> 
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" value="{{$user->password}}">
            </div>
            <div class="col-md-5"> 
                <label for="kpassw">Konfirm Password</label> 
                <input id="kpassw" type="password" name="kpassw" class="form-control" value="{{$user->password}}">
            </div>
        </div> --}}
        <div class="form-group row">
            <div class="col-md-5"> 
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="{{$user->status}}">{{$user->status}}</option>
                    <option value="">--Pilih Status--</option>
                    <option value="ACTIVE">AKTIF</option> 
                    <option value="INACTIVE">NON AKTIF</option>
                </select>
            </div>
            <div class="col-md-5"> 
                <label for="nama_ibu">Nama Ibu</label>
                <input id="nama_ibu" type="text" name="nama_ibu" class="form-control"  value="{{$user->nama_ibu}}" required>
            </div>
        </div>
        <div class="col-md-10"> 
            <input type="submit" class="btn btn-success btn-send" value="Update" >
            <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
        </div><hr>
    </fieldset>
</form>
@endsection