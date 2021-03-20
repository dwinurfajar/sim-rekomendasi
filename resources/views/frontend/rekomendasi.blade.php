@extends('frontend/master')
@section('title', 'Beranda')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Rekomendasi Destinasi</h1>
    <p class="lead">menampilkan rekomendasi destinasi</p>
  </div>


    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($rekomendasi as $rkm )
        <div class="col row-3">

          <div class="card shadow-sm">
            <a href="{{route('detail',$rkm->id)}}">
            <img style="width: 100%; height: 225px;" src="/thumbnails/{{$rkm->thumbnail}}" >
            </a>
            <div class="card-body">
              <h4>{{$rkm->nama}}</h4>
              <p class="card-text text-justify text-truncate para mb-2">{{$rkm->deskripsi}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="text-truncate col-7"><i class="fas fa-map-marker-alt"></i> {{$rkm->lokasi}}</span>
                @php
                  $rating = round($rkm->rating);
                @endphp
                <div class="btn-group">
                  <span>{{$rkm->rating}}/5</span>
                  @for($i = 0; $i < $rating; $i++)
                    <span class="fa fa-star checked"></span>
                  @endfor
                  @for($i = 0; $i < 5 - $rating ; $i++)
                    <span class="fa fa-star"></span>
                  @endfor
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
        @endforeach

      </div>
      {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $rekomendasi->links() !!}
        </div>

    </div>

@endsection



