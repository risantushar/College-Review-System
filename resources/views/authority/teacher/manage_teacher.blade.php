@extends('authority.authority_master')

@section('title')
    Manage || Teacher
@endsection
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);


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

@if(session('delete_message'))
<div class="alert alert-success">
    {{session('delete_message')}}
</div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-header">
                    <h4>Manage Teacher</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Sl No</th>
                            <th scope="col">Teacher Name</th>
                            <th scope="col">Teacher Email</th>
                            <th scope="col">Depertment</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($all_teachers as $teacher)
                            <tr class="text-center">
                                <th scope="row">{{$i++}}</th>
                                <td>{{$teacher->teacher_name}}</td>
                                <td>{{$teacher->teacher_email}}</td>
                                <td>{{$teacher->depertment}}</td>
                                <td>
                                    <div class="container">
                                        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                            @if($teacher->rating==NULL)
                                                <span style="color:red">Not raited yet!</span>
                                                @else
                                                @for ($i = 0; $i <$teacher->rating; $i++)
                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                @endfor	
                                            @endif
                                    </div>
                                </div>
                                </td>
                                <td>
                                    <a href="{{route('delete_teacher',['teacher_id'=>$teacher->teacher_id])}}" class="btn"><i style="color:red" class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            @endforeach

                          <tr class="text-center">
                            <th scope="col">Sl No</th>
                            <th scope="col">Teacher Name</th>
                            <th scope="col">Teacher Email</th>
                            <th scope="col">Depertment</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Action</th>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection