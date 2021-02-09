@extends('frontend/master')
@section('title', 'Beranda')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Rekomendasi</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
  </div>


    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($tempat as $tmt )
        <div class="col row-3">

          <div class="card shadow-sm">
            <a href="{{route('detail',$tmt->id)}}">
            <img style="width: 100%; height: 225px;" src="/thumbnails/{{$tmt->thumbnail}}" >
            </a>
            <div class="card-body">
              <h4>{{$tmt->nama}}</h4>
              <p class="card-text text-justify text-truncate para mb-2">{{$tmt->deskripsi}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span><i class="fas fa-map-marker-alt"></i> {{$tmt->lokasi}}</span>
                <div class="btn-group">
                  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
        @endforeach
      </div>
    </div>

@endsection



