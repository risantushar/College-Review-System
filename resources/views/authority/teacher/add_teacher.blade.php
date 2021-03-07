@extends('authority.authority_master')
@section('title')
Add || Teacher
@endsection

@section('body')
@if(session('add_success_message'))
    <div class="alert alert-success">
        {{session('add_success_message')}}
    </div>
@endif
    <div class="container">
        <form action="{{route('add_teacher')}}" method="POST">
            @csrf
        <div class="row justify-content-center">
            <div class="card col-md-4">
                <div class="card-header">
                    <h4>Add Teacher</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group" style="width:100%">
                            <label for="">Teacher Name:</label>
                            <input type="text" name="teacher_name" id="teacher_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group" style="width:100%">
                            <label for="">Teacher Email:</label>
                            <input type="email" name="teacher_email" id="teacher_email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group" style="width:100%">
                            <label for="">Depertment:   </label>
                            <input type="text" name="depertment" id="depertment" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-small btn-primary" style="float: right">Add Teacher</button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection