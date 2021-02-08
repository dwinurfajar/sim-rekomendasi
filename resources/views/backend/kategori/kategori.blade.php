@extends('backend/master')
@section('title', 'Kategori')
@section('content')

 <a type="button" href="{{route('kategori.create')}}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Tambah Kategori</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>Kategori
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $ktg)
                    <tr>
                        <td>{{$ktg->kategori}}</td>
                        <td class="text-center text-white">
                            <a type="button" href="{{route('kategori.edit', $ktg->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$ktg->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>                                   
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
                     var url = 'kategori/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }
    function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
</script>
@endsection