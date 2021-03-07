@extends('admin.admin_master')
@section('title')
    Student || Management
@endsection
<link href="{{asset('/adminpanel/dashboard/assets/css/photoviewer.css')}}" rel="stylesheet" />
<script src="{{asset('/adminpanel/dashboard/assets/js/photoviewer.min.js')}}"></script>

@section('body')
@if(session('verify_success_message'))
	<div class="alert alert-success">
        {{session('verify_success_message')}}
	</div>

@endif
<div class="container-fluid">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Institution Name</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Image</th>
                <th>verified_status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_students as $student)
            <tr>
                <td>{{$student->student_id}}</td>
                <td>{{$student->institution_name}}</td>
                <td>{{$student->student_name}}</td>
                <td>{{$student->student_email}}</td>
                <td>
                    <a data-gallery="example" target="_blank" href="{{asset($student->student_image)}}">
                        <img  style="height: 70px;width:70px" src="{{asset($student->student_image)}}">
                    </a>
                </td>
                <td>
                    @if($student->verified_status==0)
                        <span style="color:red">Not Verified</span>
                        @else
                        <span style="color:green">Verified</span>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
    <div class="row" style="float: right">
        {{$all_students->links()}}
    </div>
</div>

<script>
    $('[data-gallery=example]').click(function (e) {

e.preventDefault();

var items = [],
  options = {
    index: $(this).index()
  };

$('[data-gallery=manual]').each(function () {
  let src = $(this).attr('href');
  items.push({
    src: src
  });
});

new PhotoViewer(items, options);

});
</script>
@endsection