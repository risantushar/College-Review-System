@extends('student.student_master')
@section('title')
    Review || Form
@endsection

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

.container {
    /* background-color: #555; */
    /* color: #ddd; */
    border-radius: 10px;
    padding: 20px;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px
}

.container>p {
    font-size: 32px
}

.question {
    width: 75%
}

.options {
    position: relative;
    padding-left: 40px
}

#options label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer
}

.options input {
    opacity: 0
}

.checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    /* background-color: #555; */
    border: 1px solid #ddd;
    border-radius: 50%
}

.options input:checked~.checkmark:after {
    display: block
}

.options .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
    background: #21bf73;
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.btn-primary {
    background-color: #555;
    color: #ddd;
    border: 1px solid #ddd
}

.btn-primary:hover {
    background-color: #21bf73;
    border: 1px solid #21bf73
}

.btn-success {
    padding: 5px 25px;
    background-color: #21bf73
}

@media(max-width:576px) {
    .question {
        width: 100%;
        word-spacing: 2px
    }
}
</style>
@section('body')
<section class="inner_banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
               {{-- <div class="full">
                   <h3>About us</h3>
               </div> --}}
            </div>
        </div>
    </div>
  </section>
  <!-- section -->
	<section class="inner_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="full">
                       {{-- @foreach($survey_id as $survey) --}}
                       <h3>Survey Form</h3>
                       {{-- @endforeach --}}
                   </div>
                </div>
            </div>
        </div>
      </section>
      
      <!-- end section -->
    <form action="/surveys/answers/{{$survey_id->id}}" method="POST">
        @csrf
    @foreach($survey_id->questions as $key => $question)
        <div class="container mt-sm-5 my-1" >
            <div class="card">
                <div class="card-header">
                        <div class="py-2 h5"><b>Q{{$key+1}}: {{$question->question}}</b></div>
                        {{-- <input type="hidden" name='question' value="{{$question->id}}"> --}}
                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                           <fieldset>
                                @foreach($question->answers as $choice)
                                    <label class="options" for="choice{{$choice->id}}">{{$choice->choice}} 
                                        <input type="radio" name="responses[{{$key}}][choice_id]" id="choice{{$choice->id}}" value="{{$choice->id}}" required>
                                        <span class="checkmark"></span> 
                                    </label> 
                                    <input type="hidden" name='responses[{{$key}}][question_id]' value="{{$question->id}}">
                                @endforeach
                            </fieldset>
                        </div>
                </div>
            </div>
            @endforeach
            @php
                $student_id=Session::get('student_id');
                $studentInfo=DB::table('students')
                ->where('student_id',$student_id)
                ->first();

            @endphp
            <div class="container">
                <div class="row">
                    <input type="hidden" name="studentInfo[student_id]" value="{{$studentInfo->student_id}}">
                </div>
                <div class="row">
                    <input type="hidden" name="studentInfo[institution_id]" value="{{$studentInfo->institution_id}}">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div>
                        <button type="submit" style="color:white; padding-bottom: 30px 0 30px 0;float:right" class="btn btn-success">Submit Survey</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function(){
            $("surveyAnswerForm").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"/survey/answer",
                    data:$('surveyAnswerForm').serialize(),
                    success:function(response){
                        console.log(response)
                        alert("data Saved");
                    },
                    error:function(error){
                        console.log(error)
                        alert("data not saved");
                    }
                });
            });
        });

        document.getElementById("submitBtn").onclick = function() {
                this.disabled = true;
            }

    </script> --}}
@endsection