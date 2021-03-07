@extends('admin.admin_master')
@section('title')
    Manage || Authority
@endsection
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@section('body')
<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Authority Name</th>
                <th>Instution Name</th>
                <th>Authority Email</th>
                <th>Website Link</th>
                <th>Joined</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach($authorities as $authority)
                 <tr>
                <td>{{$i++}}</td>
                <td>{{$authority->authority_name}}</td>
                <td>{{$authority->institution_name}}</td>
                <td>{{$authority->authority_email}}</td>
                <td>{{$authority->website}}</td>
                <td>{{$authority->created_at}}</td>
                <td>
                    <a href="{{route('delete_authority',['authority_id'=>$authority->authority_id])}}" class="btn"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="row" style="float: right">
        {{$authorities->links()}}
    </div>
   
</div>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection