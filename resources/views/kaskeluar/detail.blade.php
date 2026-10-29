@extends('layouts.layout')
@section('content') 
<form action="" method="POST">
@csrf
 <fieldset>
 <div class="form-group row">
 <div class="col-md-5"> Nomor Transaksi<input type="text" class="form-control" value="{{$kaskeluar->nokk}}" disabled>
 </div>
 <div class="col-md-5">Tanggal transaksi<input type="date" value="{{$kaskeluar->tglkk}}" class="form-control" disabled>
 </div>
 </div>
 <div class="form-group row"> 
 <div class="col-md-10">Memo<textarea type="text" class="form-control" disabled>{{$kaskeluar->memokk}}</textarea>
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-10">Total Pengeluaran<input type="text" class="form-control" value="{{$kaskeluar->jmkk}}" disabled>
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-10">
 <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
 </div>
 </div><hr>
 </fieldset>
</form>
@endsection
