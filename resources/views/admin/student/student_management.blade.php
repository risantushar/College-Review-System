@extends('admin.admin_master')
@section('title')
    Student || Verify
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
    <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>ID No</th>
                <th>Institution Name</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Certificate</th>
                <th>Selfi</th>
                <th>verified_status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($request_students as $student)
                 <tr>
                <td>{{$student->student_id}}</td>
                <td>{{$student->institution_name}}</td>
                <td>{{$student->student_name}}</td>
                <td>{{$student->student_email}}</td>
                <td>
                    <a data-gallery="example" target="_blank" href="{{asset($student->certificate)}}">
                        <img  style="height: 70px;width:70px" src="{{asset($student->certificate)}}">
                    </a>
                </td>
                <td>
                    <a data-gallery="example" target="_blank" href="{{asset($student->selfi_image)}}">
                         <img style="height: 70px;width:70px" src="{{asset($student->selfi_image)}}">
                    </a>
                   
                </td>
                <td>
                    @if($student->verified_status==0)
                        <span style="color:red">Not Verified</span>
                        @else
                        <span style="color:green">Verified</span>
                    @endif
                </td>
                <td>
                    <div class="row" style="display:inline">
              
                        <a href="{{route('student_verify',['student_id'=>encrypt($student->student_id)])}}" class="dlt_btn" style="padding-right:15px;padding-left:10px;color:green"><i class="fa fa-check"></i></a>
                        <a href="{{route('student_verify_cancel',['student_id'=>encrypt($student->student_id)])}}" class="dlt_btn"style="padding-right:15px"><i class="fa fa-close" style="color: red"></i></a>
                  </div>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="row" style="float: right">
        {{-- {{$request_students->links()}} --}}
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