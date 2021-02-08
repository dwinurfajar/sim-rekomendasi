@extends('backend/master')
@section('title', 'Tambah Kategori')
@section('content')

<div class="content">
	<div class="container">
		<form method="post" action="{{route('kategori.update', $kategori->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="mb-3 mt-3">
	  		<label  class="form-label">Kategori</label>
	  		<input type="text"  class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="Kategori" value="{{$kategori->kategori}}">
	  		@error('kategori')
	            <span class="invalid-feedback" role="alert">
	            <strong>{{ $message }}</strong>
	            </span>
	        @enderror
		</div>
	
		<div class="row">
		    <div class="col text-center">
		        <a href="{{route('kategori.index')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
		        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
		        </form>
		    </div>  
		</div>
	</div>
	
</div>


@endsection