
@extends('student.student_master')
@section('title')
    Review || Form
@endsection

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/* Styling h1 and links
––––––––––––––––––––––––––––––––– */
h1[alt="Simple"] {color: white;}
a[href], a[href]:hover {color: grey; font-size: 0.5em; text-decoration: none}


@keyframes zoomstars {
  0% {
    opacity: 1;
  }
  100% {
    transform: scale(2);
    opacity: 0;
  }
}


body
{
 background: #4a4a4c !important;
}

.starrating > input {display: none;}  /* Remove radio buttons */

.starrating > label:before { 
  content: "\f006"; /* Star */
  margin: 2px;
  font-size: 4em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating > label
{
  color: #222222; /* Start color when not clicked */
}

.starrating > input:checked ~ label
{ color: #ffca08 ; } /* Set yellow color when star checked */

.starrating > input:hover ~ label
{ color: #ffca08 ;  } /* Set yellow color when star hover */

.risingstar > label:after
{
 font-family: FontAwesome;
 content: "\f006"; /* Star */
 display: none;
 position: absolute;
 margin: 2px;
 font-size: 1em;
 top: 0;
}

.risingstar > input:checked + label:after
{  

 animation: 0.7s zoomstars;
 display: block;
}

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
                       <h4>Rate Our College</h4>
                   </div>
                </div>
            </div>
        </div>
      </section>
      <!-- end section -->
    <form action="{{route('rating')}}" method="POST">
        @csrf
        <div class="container mt-sm-5 my-1" >
            <div class="card">
                <div class="card-header">
                    <div class="py-2 h5"><b>Provide your valuable rating:</b></div>
                </div>
                <div class="card-body">
                    <div class="container">
                    <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                    {{-- <a href="{{route('next_question', ['question_id' => $survey->question_id])}}"  style="color:white; padding-bottom: 30px 0 30px 0;float:right" class="btn btn-success">Next</a> --}}
                    <button type="submit" style="color:white; padding-bottom: 30px 0 30px 0;float:right" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection