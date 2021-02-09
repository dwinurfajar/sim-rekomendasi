@extends('frontend/master')
@section('title', 'Detail')
@section('content')
<!--star-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
p {
  white-space: pre-wrap; 
}
</style>

<div class="container mt-3">
  <div class="row">
    <div class="col-sm">
      <img src="/thumbnails/{{$tempat->thumbnail}}" class="rounded float-left" alt="..." style="width: 100%; height: 300px;">
    </div>
    <div class="col-sm">
		    <h3 class="mt-0">{{$tempat->nama}}</h3>
		    <div class="d-flex justify-content-between">
		    	<div class="d-flex">
		            <span class="ml-2"> <i class="fas fa-map-marker-alt"></i> {{$tempat->lokasi}}</span>
		                
		        </div>
		        <div>
		        	<span>{{$rating}}/5</span>
		            @for($i = 0; $i < $rating	; $i++)
						<span class="fa fa-star checked"></span>
					@endfor
					@for($i = 0; $i < 5-$rating	; $i++)
						<span class="fa fa-star"></span>
					@endfor
		        </div>
		              
		    </div>
		    <div class="mt-2">
		    	<p>{{$tempat->deskripsi}}</p>
		    </div>


    </div>
  </div>
</div>



<?php
$x = 0
?>
@guest
	<?php
		$x = 0
	?>
@else
	@foreach ($ratings as $rtg)
		@if($rtg->user_id == Auth::user()->id)
			<?php
				$x = 1
			?>
		@endif
	@endforeach
@endguest

@if( $x == 0 )
<div class="container">
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
	  <label  class="form-label">Ulas</label>
	  <textarea class="form-control" name="ulasan" rows="3"></textarea>
	  <input type="hidden" name="place_id" value="{{$tempat->id}}">
	</div>
	<button type="submit" class="btn-primary">
		  	Simpan</button>
	</form>
	@endif
</div>

<div class="container mb-3 mt-3">
	<label  class="form-label">Ulasan</label>
	@foreach ($ratings as $rtg)
		<div class="card mt-2">
			<div class="card-header">
				{{$rtg->name}}
			</div>
			<div class="card-body">
				@for($i = 0; $i < $rtg->nilai; $i++)
				<span class="fa fa-star checked"></span>
				@endfor
				@for($i = 0; $i < 5 - $rtg->nilai	; $i++)
					<span class="fa fa-star"></span>
				@endfor
				<p class="small">{{$rtg->ulasan}}</p>
				<p class="small">{{$rtg->created_at}}</p>

			</div>
			
			
			
		</div>
		
	@endforeach

</div>


<script type="text/javascript">
	$(':radio').change(function() {
	  	console.log('New star rating: ' + this.value);
	});	
	</script>
@endsection