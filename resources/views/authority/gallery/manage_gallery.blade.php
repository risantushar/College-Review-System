@extends('authority.authority_master')
@section('title')
Gallery || Management
@endsection

@section('body')
@if(session('image_delete_message'))
	<div class="alert alert-success">
        {{session('image_delete_message')}}
	</div>

@endif
<div class="container-fluid">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="text-center">
                <th>Sl No</th>
                <th>Image Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach($all_images as $image)
                <tr class="text-center">
                <td>{{$i++}}</td>
                <td>{{$image->image_title}}</td>
                <td>
                    <a data-gallery="example" target="_blank" href="{{asset($image->image)}}">
                        <img  style="height: 70px;width:70px" src="{{asset($image->image)}}">
                    </a>
                </td>
                <td >
                    <div class="row" style="display:inline">
                        {{-- <a href="" class="dlt_btn" style="padding-right:15px;padding-left:10px;color:blue"><i class="fa fa-edit"></i></a> --}}
                        <a href="{{route('delete_image',['image_id'=>$image->image_id])}}" class="dlt_btn"style="padding-right:15px"><i class="fa fa-trash" style="color: red"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="row" style="float: right">
        {{-- {{$request_students->links()}} --}}
    </div>
</div>
@endsection