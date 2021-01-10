@extends('backend/master')
@section('title', 'Tambah Tempat')
@section('content')
	<div class="mb-3 mt-3">
  		<label for="exampleFormControlInput1" class="form-label">Nama Tempat</label>
  		<input type="email" class="form-control" id="exampleFormControlInput1">
	</div>
	<div class="mb-3">
  		<label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
  		<textarea class="form-control" id="exampleFormControlTextarea1" rows="15"></textarea>
	</div>
	<div class="mb-3">
	  	<label for="formFile" class="form-label">Thubmnail</label>
	  	<input class="form-control" type="file" id="formFile">
	</div>
@endsection