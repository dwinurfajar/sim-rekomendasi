@extends('backend/master')
@section('title', 'Tempat Wisata')
@section('content')

 <a type="button" href="{{route('tempat.create')}}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Tambah Tempat</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Tempat</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tempat as $tmt)
                    <tr>
                        <td>{{$tmt->nama}}</td>
                        <td>{{$tmt->lokasi}}</td>
                        <td>{{$tmt->ktg}}</td>
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
@endsection