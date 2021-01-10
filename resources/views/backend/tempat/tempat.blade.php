@extends('backend/master')
@section('title', 'Tempat Wisata')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<div class="mt-2">
  <table id="dataTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama Tempat</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>
                    <a type="button" href="{{route('admin')}}" style="color: blue;"><span data-feather="eye"></span></a>
                    <a type="button" href="{{route('admin')}}" style="color:green;"><span data-feather="edit"></span></a>
                    <a type="button" href="{{route('admin')}}" style="color:red;"><span data-feather="delete"></span></a>
                </td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </tfoot>
    </table>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('backend/js/datatable1.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>


@endsection