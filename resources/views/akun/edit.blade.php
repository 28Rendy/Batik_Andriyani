@extends('layouts.layout')

@section('content')
<form action="{{route('akun.update', [$akun->id])}}" method="POST"> 
    @csrf
    <input type="hidden" name="_method" value="PUT"> 
    <fieldset> 
    <legend>Edit Data Persediaan</legend>
    <div class="form-group row"> 
        <div class="col-md-5">
        <label for="kode">Kode Persediaan</label>
        <input id="kode" type="text" name="kode" class="form-control" value="{{$akun->kdps}}">
    </div>
    <div class="col-md-5">
        <label for="js">Jumlah Stok</label>
        <input id="js" type="text" name="js" class="form-control"value="{{$akun->js}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-5">
        <label for="nmps">Nama Persediaan</label>
        <select id="nmps" name="nmps"class="form-control">
        <option value="{{$akun->nmps}}">{{$akun->nmps}}</option>
        <option value="">--Pilih Nama Persediaan--</option> 
        <option value="Fiesta Chicken Nugget">Fiesta Chicken Nugget</option>
        <option value="So Nice Chicken Sausage">So Nice Chicken Sausage</option>
        <option value="Bakso Sapi So Good">Bakso Sapi So Good</option>
        <option value="Fiesta Tempura">Fiesta Tempura</option>
        <option value="Fiesta Mixed Vegetables">Fiesta Mixed Vegetables</option>
        <option value="Pizza Papa Rons Frozen">Pizza Papa Rons Frozen</option> 
        <option value="So Good Dinsum">So Good Dinsum</option>
        </select>
    </div>
    <div class="col-md-5">
        <label for="no_hp">Harga Jual</label>
        <input id="hj" type="text" name="hj" class="form-control" value="{{$akun->hj}}">
    </div>
</div>
<div class="col-md-10">
    <input type="submit" class="btn btn-success btn-send" value="Update" >
    <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
</div><hr>
</fieldset>
</form>
@endsection