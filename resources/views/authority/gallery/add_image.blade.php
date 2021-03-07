@extends('authority.authority_master')
@section('title')
Add || Image
@endsection
@section('body')
@if(session('image_success_message'))
    <div class="alert alert-success">
        {{session('image_success_message')}}
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Image
                    </div>
                    <div class="card-body">
                        <form action="{{route('gallery_image_upload')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image Title</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group">
                                       <input id="image_title" name="image_title" placeholder="Enter title" class="form-control" required="true" type="text"></div>
                                </div>
                             </div>
                            <div class="form-group">
                                <input type="file" name="image[]" class="form-control-image" multiple>
                            </div>
                            <input type="submit" value="upload" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection