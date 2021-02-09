

<link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

<div class="container">
	<form method="post" action="{{route('store')}}" enctype="multipart/form-data">
	@csrf
	<div class="mb-3 mt-3">
  		<label  class="form-label">Nama Tempat</label>
  		<input type="text"  class="form-control @error('nama') is-invalid @enderror" name="nama">
  		@error('nama')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="mb-3 mt-3">
  		<label class="form-label">Lokasi</label>
  		<input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi">
  		@error('lokasi')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="mb-3 mt-3">
  		<label class="form-label">Kategori</label>
  		<select class="custom-select @error('lokasi') is-invalid @enderror" name="kategori">
        <option selected disabled value="">choose</option>
        @foreach ($kategori as $ktg)
        <option value="{{$ktg->id}}">{{$ktg->kategori}}</option>
        @endforeach
      </select>
  		@error('kategori')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
      @enderror
	</div>
	<div class="mb-3">
  		<label class="form-label">Deskripsi</label>
  		<textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="15"></textarea>
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
		        <a href="{{url('/')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
		        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
		        </form>
		    </div>  
		</div>
	
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/datatables-demo.js')}}"></script>

