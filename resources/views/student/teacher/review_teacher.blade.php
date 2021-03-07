@extends('student.student_master')
@section('title')
    Teachers
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
    
    .starrating > input {display: none;}  /* Remove radio buttons */
    
    .starrating > label:before { 
      content: "\f006"; /* Star */
      margin: 2px;
      font-size: 2em;
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
    <!-- section -->
	
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
      
      <!-- end section -->
	<!-- section -->
	<section class="inner_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="full">
                       <h3>Teachers List</h3>
                   </div>
                </div>
            </div>
        </div>
      </section>
      <!-- end section -->

        
      <div class="container-fluid">
        <div class="row">
            <table id="top_college_table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center" style="background: darkgrey">
                        <th>Sl No</th>
                        <th>Teacher Name</th>
                        <th>Teacher Email</th>
                        <th>Depertment</th>
                        <th>Review</th>
                        {{-- <th class="text-center">Review</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($teachers as $teacher)
                <tr class="text-center">
                    <td>{{$i++}}</td>
                    <td>{{$teacher->teacher_name}}</td>
                    <td>{{$teacher->teacher_email}}</td>
                    <td>{{$teacher->depertment}}</td>
                    <td>
                        @php
                        $student_id=Session::get('student_id');
                            $checkratingstatus=DB::table('teacher_ratings')
                            ->where('student_id',$student_id)
                            ->where('teacher_id',$teacher->teacher_id)
                            ->first();
                        @endphp
                        @if($checkratingstatus==true)
                        <button type="button" class="btn btn-warning" disabled data-toggle="modal" data-target="#exampleModal" data-id="{{$teacher->teacher_id}}">Rated</button>
                            @else
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="{{$teacher->teacher_id}}">Review</button>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
              
                <tfoot>
                    <tr class="text-center" style="background: darkgrey">
                        <th>Sl No</th>
                        <th>Teacher Name</th>
                        <th>Teacher Email</th>
                        <th>Depertment</th>
                        <th>Review</th>
                        {{-- <th>Make Review</th> --}}
                    </tr>
                </tfoot>
            </table>
    
            <div class="container" style="margin-bottom: 15px">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      {{-- {{$top_colleges->links()}} --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
      
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" 
style="position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Teacher Review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('rate_teacher')}}" method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" class="form-control" id="teacher_id" name="teacher_id">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Review</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var teacherId = button.data('id')

      var modal = $(this)
      modal.find('.modal-body #teacher_id').val(teacherId);
     });
</script>
@endsection