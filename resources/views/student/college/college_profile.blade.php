@extends('student.student_master')
@section('title')
College || Profile
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
<!-- section -->
<div class="section margin-top_50 silver_bg" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="full float-right_img">
                    <img src="{{asset($institutionInfos->institution_image)}}" alt="#" />
                </div>
            </div>
            <div class="col-md-6 layout_padding_2">
                <div class="full">
                    <div class="heading_main text_align_left">
                       <h2><span>{{$institutionInfos->institution_name}}</h2>
                    </div>
                    <div class="full">
                      <p>{{$institutionInfos->institution_description}}</p>
                    </div>
                    <div class="full">
                       <a class="hvr-radial-out button-theme" target="_blank" href="{{$institutionInfos->website}}" style="color:white;font-size:16px"><i class="fa fa-globe"></i> Visit Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
 
 <!-- section -->
 <div class="section layout_padding padding_bottom-0">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="full">
                     <div class="heading_main text_align_center">
                        <h2><span>Gallery</span></h2>
                     </div>
                   </div>
             </div>
           </div>
            <div class="row">
             <div class="col-lg-12">
                 <div id="demo" class="carousel slide" data-ride="carousel">

                     <!-- The slideshow -->
                     <div class="carousel-inner">
                         <div class="carousel-item active">
                             <div class="row">
                                @foreach ($galleryImages as $image)
                                 <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="full blog_img_popular">
                                       <img class="img-responsive" style="height: 300px;width:500px" src="{{asset($image->image)}}" alt="#" />
                                       <h4>{{$image->image_title}}</h4>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                         </div>
                        
                         <div class="carousel-item">
                             <div class="row">
                                @foreach ($galleryImages as $image)
                                 <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="full blog_img_popular">
                                       <img class="img-responsive" style="height: 300px;width:500px" src="{{asset($image->image)}}" alt="#" />
                                       <h4>{{$image->image_title}}</h4>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>

                     <!-- Left and right controls -->
                     <a class="carousel-control-prev" href="#demo" data-slide="prev">
                         <span class="carousel-control-prev-icon"></span>
                     </a>
                     <a class="carousel-control-next" href="#demo" data-slide="next">
                         <span class="carousel-control-next-icon"></span>
                     </a>

                 </div>
             </div>

         </div>			  
        </div>
     </div>
 <!-- end section -->
 <!-- section -->
 <div class="section layout_padding padding_bottom-0">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="full">
                     <div class="heading_main text_align_center">
                        <h2><span>Best Techers</span></h2>
                     </div>
                   </div>
             </div>
             
             <div class="container-fluid">
                <div class="row">
                    <table id="top_college_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center" style="background: darkgrey">
                                {{-- <th>Sl No</th> --}}
                                <th>Teacher Name</th>
                                <th>Teacher Email</th>
                                <th>Depertment</th>
                                <th>Rating</th>
                                {{-- <th class="text-center">Review</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($teachers as $teacher)
                        <tr class="text-center">
                            {{-- <td>{{$i++}}</td> --}}
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
                        </tr>
                        @endforeach
                        </tbody>
                      
                        <tfoot>
                            <tr class="text-center" style="background: darkgrey">
                                {{-- <th>Sl No</th> --}}
                                <th>Teacher Name</th>
                                <th>Teacher Email</th>
                                <th>Depertment</th>
                                <th>Rating</th>
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
           </div>
        </div>
     </div>
 <!-- end section -->

@endsection