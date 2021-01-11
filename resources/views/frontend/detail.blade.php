@extends('frontend/master')
@section('title', 'Detail')
@section('content')

	<div class="text-center">
		<img src="/thumbnails/{{$tempat->nama}}" class="rounded" style="width: 60%; height: 40%;">
		<h3>{{$tempat->nama}}</h3>
		<span data-feather="map-pin">{{$tempat->lokasi}}</span>
		<span>{{$tempat->lokasi}}</span>
		<span class="rating-static rating-35" style="align-content: center;"></span>
		<p>{{$tempat->deskripsi}}</p>
	</div>
	<div class="text-center">
		<form>
			<label>Ulas</label>
		</form>
	</div>

@endsection