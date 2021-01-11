@extends('backend/master')
@section('title', 'Edit Tempat')
@section('content')
<form method="post" action="{{route('tempat.update', $tempat->nama)}}" enctype="multipart/form-data">
	@csrf
  @method('PATCH')
	<div class="mb-3 mt-3">
  		<label  class="form-label">Nama Tempat</label>
  		<input type="text"  class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$tempat->nama}}">
  		@error('nama')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="mb-3 mt-3">
  		<label class="form-label">Lokasi</label>
  		<input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{$tempat->lokasi}}">
  		@error('lokasi')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="mb-3 mt-3">
  		<label class="form-label">Kategori</label>
  		<input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{$tempat->kategori}}">
  		@error('kategori')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="mb-3">
  		<label class="form-label">Deskripsi</label>
  		<textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="15" >{{$tempat->deskripsi}}</textarea>
  		@error('deskripsi')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="mb-3">
	  	<label class="form-label">Thumbnail</label>
	  	<input class="form-control @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail">
	  	@error('thumbnail')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
		<div class="row">
		    <div class="col text-center">
		        <a href="#" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
		        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
		        </form>
		    </div>  
		</div>

	
@endsection