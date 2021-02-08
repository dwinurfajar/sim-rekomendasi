@extends('backend/master')
@section('title', 'Tempat Wisata')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>User Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                    <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $usr)
                    <tr>
                        <td>{{$usr->name}}</td>
                        <td>{{$usr->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
 </div>

@endsection