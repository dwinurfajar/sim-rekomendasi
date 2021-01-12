@extends('frontend/master')
@section('title', 'Detail')
@section('content')

<div class="card mb-3">
  <img src="/thumbnails/{{$tempat->nama}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$tempat->nama}}</h5>
    <div class="d-flex justify-content-between">
    	<div class="d-flex">
            <span data-feather="map-pin">asdas</span>
            <span>{{$tempat->lokasi}}</span>
                
        </div>
        <div>
            <span class="rating-static rating-33"></span>
        </div>
              
    </div>
    <div class="mt-2">
    	<p class="card-text">{{$tempat->deskripsi}}</p>
    </div>
  </div>
</div>


<label>Rating</label>
<div class="mb-3">

	<form class="rating" action="{{route('rating.store')}}" method="post">
		@csrf
	  <label>
	    <input type="radio" name="nilai" value="1" />
	    <span class="icon">★</span>
	  </label>
	  <label>
	    <input type="radio" name="nilai" value="2" />
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	  </label>
	  <label>
	    <input type="radio" name="nilai" value="3" />
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	    <span class="icon">★</span>   
	  </label>
	  <label>
	    <input type="radio" name="nilai" value="4" />
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	  </label>
	  <label>
	    <input type="radio" name="nilai" value="5" />
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	    <span class="icon">★</span>
	  </label>
</div>
<div class="mb-3">
  <label  class="form-label">Ulasan</label>
  <textarea class="form-control" name="ulasan" rows="3"></textarea>
  <input type="hidden" name="place_id" value="{{$tempat->id}}">
</div>
<button type="submit" class="btn-primary">
	  	Simpan</button>
</form>

<div class="mb-3 mt-3">
	@foreach ($rating as $rtg)
		<p>{{$rtg->name}}</p>
		<span class="rating-static rating-{{$rtg->nilai}}"></span>
		<p class="small">{{$rtg->ulasan}}</p>
	@endforeach

</div>

<script type="text/javascript">
	$(':radio').change(function() {
	  	console.log('New star rating: ' + this.value);
	});
	</script>
@endsection