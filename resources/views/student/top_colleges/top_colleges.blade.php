@extends('student.student_master')
@section('title')
    Top || Colleges
@endsection

<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/* Styling h1 and links
––––––––––––––––––––––––––––––––– */
h1[alt="Simple"] {color: white;}
a[href], a[href]:hover {color: grey; font-size: 0.5em; text-decoration: none}


.starrating > input {display: none;}  /* Remove radio buttons */

.starrating > label:before { 
  content: "\f005"; /* Star */
  margin: 2px;
  font-size: 1em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating > label
{
  color: #ffca08; /* Start color when not clicked */
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
                       <h3>Top Colleges</h3>
                   </div>
                </div>
            </div>
        </div>
      </section>
      <!-- end section -->
      
<div class="container text-center">
    <h4 style="text-transform: uppercase;font-weight:bold;">Top Colleges List</h4>
    <hr>
</div>
<div class="container-fluid">
    <div class="row">
        <table id="top_college_table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">College Name</th>
                    <th class="text-center">EIIN Number</th>
                    <th class="text-center">Website</th>
                    <th class="text-center">College Email</th>
                    <th class="text-center">Contact Number</th>
                    <th class="text-center">Rating</th>
                    {{-- <th class="text-center">Review</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($top_colleges as $college)     
                <tr>
                    <td><a href="{{route('college_profile_page',['college_id'=>$college->institution_id])}}" style="cursor: pointer;font-size:1rem">{{$college->institution_name}}</a></td>
                    <td>{{$college->institution_eiin}}</td>
                    <td><a target="_blank" style="font-size: 15px" href="{{url($college->website)}}">{{$college->website}}</a></td>
                    <td>{{$college->institution_email}}</td>
                    <td>{{$college->contact_no}}</td>
                    <td>
                        <div class="container">
                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                        @for ($i = 0; $i <$college->rating; $i++)
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                        @endfor	
                            </div>
                        </div>
                    </td>
                    {{-- <td><a href="{{route('review_page',['survey_id'=>$college->survey_id])}}" class="btn btn-success" style="color:white;font-size:12px" href="">Review</a></td> --}}
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th>College Name</th>
                    <th>EIIN Number</th>
                    <th>College Website</th>
                    <th>College Email</th>
                    <th>Contact Number</th>
                    <th>Rating</th>
                    {{-- <th>Make Review</th> --}}
                </tr>
            </tfoot>
        </table>

        <div class="container" style="margin-bottom: 15px">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  {{$top_colleges->links()}}
                </ul>
            </nav>
        </div>
        
        
    </div>
</div>

@endsection