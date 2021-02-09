@extends('backend/master')
@section('title', 'Tempat Wisata')
@section('content')

 <a type="button" href="{{route('tempat.create')}}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Tambah Tempat</a>

 <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>Belum Terkonfirmasi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Tempat</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Thumbnail</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unconfirmed as $ucf)
                    <tr>
                        <td>{{$ucf->nama}}</td>
                        <td>{{$ucf->lokasi}}</td>
                        <td>{{$ucf->ktg}}</td>
                        <td><img src="/thumbnails/{{$ucf->thumbnail}}" style="height: 50px; width: 80px;"></td>
                        <td>{{$ucf->rating}}</td>
                        <td class="text-center text-white">
                            <form method="post" action="{{route('konfirmasi', $ucf->id)}}">
                                @csrf
                                <input type="hidden" name="konfirmasi" value="1">
                                <button type="submit" class="badge badge-primary"><i class="fas fa-check mr-1"></i>Konfirmasi</button>
                            </form>
                            
                            <a type="button" href="{{route('tempat.show', $ucf->id)}}"  class="badge badge-info"><i class="fas fa-info-circle mr-1"></i>Detail</a>
                            <a type="button" href="{{route('tempat.edit', $ucf->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$ucf->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>                                   
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
     </div>
 </div>


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>Sudah Terkonfirmasi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Tempat</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Thumbnail</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tempat as $tmt)
                    <tr>
                        <td>{{$tmt->nama}}</td>
                        <td>{{$tmt->lokasi}}</td>
                        <td>{{$tmt->ktg}}</td>
                        <td><img src="/thumbnails/{{$tmt->thumbnail}}" style="height: 50px; width: 80px;"></td>
                        <td>{{$ucf->rating}}</td>
                        <td class="text-center text-white">

                            <a type="button" href="{{route('tempat.show', $tmt->id)}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>
                            <a type="button" href="{{route('tempat.edit', $tmt->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$tmt->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>                                   
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
     </div>
 </div>

           <!-- Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
            <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data?</p>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                        <button type="submit" onclick="formSubmit()" class="btn btn-danger" data-dismiss="modal">Ya, Lanjutkan</button>
                      </div>
                    </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function deleteData(id){
                     var id = id;
                     var url = 'tempat/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }
    function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
</script>

@endsection