@extends('authority.authority_master')
@section('title')
    Previous || Surveys
@endsection
@section('body')

@if(session('delete_message'))
	<div class="alert alert-success">
        {{session('delete_message')}}
	</div>
@elseif(session('survey_publish_message'))
	<div class="alert alert-success">
        {{session('survey_publish_message')}}
	</div>
@elseif(session('survey_unpublish_message'))
	<div class="alert alert-success">
        {{session('survey_unpublish_message')}}
	</div>

@endif
    <div class="container">
        <div class="row">
          <div class="card col-md-12">
            <div class="card-header">
              <h4>All Created Survey</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">SL</th>
                      <th scope="col">Survey Title</th>
                      {{-- <th scope="col">Servey Purpose</th> --}}
                      <th scope="col">Created</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=1;
                      @endphp
                      @foreach ($get_surveys as $surveys)
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$surveys->title}}</td>
                      {{-- <td>{{$surveys->purpose}}</td> --}}
                      <td>{{$surveys->created_at}}</td>
                      <td>
                          <div class="row" style="display:inline">
            
                              <a href="{{route('create_question',['surveyInfo'=>$surveys->id])}}" class="dlt_btn" style="color:green"><i class="fa fa-plus"></i></a>
                              <a href="{{route('survey_result_page',['survey_id'=>$surveys->id])}}" class="dlt_btn" style="padding-right:15px;padding-left:10px;color:yellowgreen"><i class="fa fa-list-alt"></i></a>
                              <a href="{{route('delete_survey',['survey_id'=>$surveys->id])}}" class="dlt_btn"style="padding-right:15px"><i class="fa fa-trash" style="color: red"></i></a>
                              <a href="{{route('publish_survey',['survey_id'=>$surveys->id])}}" class="dlt_btn"style="padding-right:15px"><i class="fa fa-eye"></i></a>
              
                              <a href="{{route('unpublished_survey',['survey_id'=>$surveys->id])}}" class="dlt_btn"><i class="fa fa-eye-slash"></i></a>
                              {{-- <a href="{{route('edit-category',['id'=>$category->id])}}" class="dlt_btn" style="padding-right:15px"><i class="fas fa-edit"></i></a>
                      
                              <a href="{{route('delete-category',['id'=>$category->id])}}" class="dlt_btn"style="padding-right:15px"><i class="fas fa-trash"></i></a>
              
                              <a href="{{route('published-category',['id'=>$category->id])}}" class="dlt_btn"style="padding-right:15px"><i class="fas fa-eye"></i></a>
              
                              <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="dlt_btn"><i class="fas fa-eye-slash"></i></a> --}}
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
          </div>
        </div>
    </div>
@endsection