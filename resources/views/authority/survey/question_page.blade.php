@extends('authority.authority_master')
@section('title')
    {{$surveyInfo->title}}
@endsection
@section('body')
@if(session('delete_message'))
<div class="alert alert-success">
     {{session('delete_message')}}
</div>
@elseif(session('question_add_message'))
<div class="alert alert-success">
    {{session('question_add_message')}}
</div>
@endif
<div class="container col-md-6">
    <thead>Create Questions</thead>
    <table class="table table-striped">
       <tbody>
          <tr>
             <td>
                <form action="{{route('add_question',['survey_id'=>$surveyInfo->id])}}" method="POST" class="well form-horizontal" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                         <label class="col-md-4 control-label">Question</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                {{-- <input type="hidden" value="{{$surveyInfo->id}}" id="question" name="survey_id"> --}}
                                <input type="hidden" value="{{$surveyInfo->id}}" id="question" name="survey_id">
                                <input id="question" name="question[question]"
                                 placeholder="Enter your question" class="form-control"
                                value="{{old('question')}}" type="text" required>
                            </div>
                            @error('question.question')
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                         </div>
                      </div>

                      <div class="form-group">
                          <fieldset>
                              <legend>Choices</legend>
                              <div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Choice 1</label>
                                    <div class="col-md-8 inputGroupContainer">
                                       <div class="input-group">
                                           <span class="input-group-addon">
                                               <i class="glyphicon glyphicon-home"></i>
                                           </span>
                                           <input id="answer1" name="choices[][choice]"
                                            class="form-control" placeholder="Enter Choice 1"
                                            value="{{old('answers.0.answer')}}" type="text" required>
                                        </div>
                                        @error('answers.0.answer')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                 </div>
                              </div>

                              <div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Choice 2</label>
                                    <div class="col-md-8 inputGroupContainer">
                                       <div class="input-group">
                                           <span class="input-group-addon">
                                               <i class="glyphicon glyphicon-home"></i>
                                           </span>
                                           <input id="answer2" name="choices[][choice]"
                                            class="form-control" placeholder="Enter Choice 2"
                                            value="{{old('answers.1.answer')}}" type="text" required>
                                        </div>
                                        @error('answers.1.answer')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                 </div>
                              </div>

                              <div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Choice 3</label>
                                    <div class="col-md-8 inputGroupContainer">
                                       <div class="input-group">
                                           <span class="input-group-addon">
                                               <i class="glyphicon glyphicon-home"></i>
                                           </span>
                                           <input id="answer3" name="choices[][choice]"
                                            class="form-control" placeholder="Enter Choice 3"
                                            value="{{old('answers.2.answer')}}" type="text" required>
                                        </div>
                                        @error('answers.2.answer')
                                                <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                 </div>
                              </div>
                          </fieldset>
                      </div>
                   <button type="submit" class="btn btn-success">Add Question</button>
                </form>
             </td>
          </tr>
       </tbody>
    </table>

    @foreach($surveyInfo->questions as $question)
    <div class="container">
        <div class="row">
            <div class="card mb-20px" style="width: 520px">
                <div class="card-header">{{$question->question}}</div>
                <div class="card-body">
                    <ul class="list-group"> 
                        @foreach($question->answers as $choice)
                            <li class="list-group-item">{{$choice->choice}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{route('delete_question',['question_id'=>$question->id])}}" class="btn btn-danger" style="float: right">Delete</a>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
 </div>

@endsection
