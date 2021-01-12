@extends('frontend/master')
@section('title', 'Detail')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Rekomendasi</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($tempat as $tmt)
        <div class="col row-3">

          <div class="card shadow-sm">
            <a href="{{route('detail',$tmt->id)}}">
            <img style="width: 100%; height: 225px;" src="/thumbnails/{{$tmt->nama}}" >
            </a>
            <div class="card-body">
              <h4>{{$tmt->nama}}</h4>
              <p class="card-text text-justify text-truncate para mb-2">{{$tmt->deskripsi}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <span class="rating-static rating-{{$rating}}"></span>
              </div>
            </div>
            
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection



