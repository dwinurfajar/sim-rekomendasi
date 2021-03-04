@extends('backend/master')
@section('title', 'Dasboard')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm">
			<div class="card text-center mt-3">
			  <div class="card-header">
			    Total Tempat
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">{{$tempat}}</h5>
			    
			  </div>
			</div>
		</div>
		
		<div class="col-sm">
			<div class="card text-center mt-3">
			  <div class="card-header">
			    Total User
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">{{$user}}</h5>
			    
			  </div>
			</div>
		</div>
	</div>
	
</div>
@endsection