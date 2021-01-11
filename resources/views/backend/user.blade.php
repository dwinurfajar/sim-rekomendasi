@extends('backend/master')
@section('title', 'Tempat Wisata')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<div class="mt-2">
  <table id="dataTable" class="display" style="width:100%">
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


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('backend/js/datatable1.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>


@endsection