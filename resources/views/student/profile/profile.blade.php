@extends('student.student_master')
@section('title')
    Profile
@endsection
<style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
@section('body')
<div class="container emp-profile mt-100">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img style="height: 200px;width:150px" src="{{asset($student_infos->student_image)}}" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                <h2>
                                    {{$student_infos->student_name}}
                                </h2>
                                <h6>
                                    {{$student_infos->institution_name}}
                                </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('edit_profile_page',['student_id'=>encrypt($student_infos->student_id)])}}" class="profile-edit-btn" name="btnAddMore" >Edit Profile <i class="fa fa-edit"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User ID:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$student_infos->student_id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$student_infos->student_name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$student_infos->student_email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Verified Profile:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    @if($student_infos->verified_status==0)
                                                        <i class="fa fa-close" style="color:red"> Non verified account</i>
                                                        @else
                                                        <i class="fa fa-check-circle" style="color:green">Verified account</i>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                            </div>
                            @if($student_infos->verified_status==0)
                            <div class="col-md-12" >
                                <a href="{{route('account_verify_page',['student_id'=>encrypt($student_infos->student_id)])}}" style="background: #3736B2;color:white;text-align:center" type="submit" class="profile-edit-btn" name="btnAddMore">Verify your account</a>
                            </div>  
                            @endif
                        </div>
                    </div> 
                </div>
            </form>    
                
        </div>
@endsection