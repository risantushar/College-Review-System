@extends('authority.authority_master')
@section('title')
    Survey || Result
@endsection

@section('body')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Survey Result</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fa fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Vote</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$vote}} Students</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_students}} Students</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Survey Completed
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$survey_percentage=$vote * 100/$total_students}}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{$survey_percentage}}%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                               Demo text
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="container" style="padding:20px">
        <div class="row">
            <!-- Content Column -->
            @php
                $i=1;
            @endphp
            @foreach($survey_id->questions as $question)
                <div class="card col-md-4" >
                    <div class="card-header">
                        <span>Q{{$i++}}: {{$question->question}}</span>
                    </div>
                    <div class="card-body">
                        <ul class="list-group"> 
                            @foreach($question->answers as $answer)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>{{$answer->choice}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span style="float:right">{{($answer->responses->count() * 100) / $question->responses->count()}}%</span>
                                            {{-- <span style="float:right">{{}}</span> --}}
                                        </div>
                                    </div>
                                </li>                
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>

   {{-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> --}}
            {{-- <div id="" style="height: 300px; width: 100%;margin:auto">
                <canvas id="barChart"></canvas>
            </div> --}}

{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script> --}}

{{-- <script>
    $(function(){
        // var datas=<?php echo json_encode($datas);?>;
        var barCanvas=$("barChart");
        var barChart=new Chart(barCanvas,{
            type:'bar',
            data:{
                labels:[,'Question 1','Question 2','Question 3','Question 4'],
                datasets:[
                    {
                        label:'Survey Results',
                        data:datas,
                        background:['red','green','orange','blue']
                    }
                ]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero:
                        }
                    }]
                }
            }
        })
    });
</script> --}}

 {{-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
// <script>
//     window.onload = function () {
    
//     var chart = new CanvasJS.Chart("chartContainer", {
//         animationEnabled: true,
//         theme: "light2", // "light1", "light2", "dark1", "dark2"
//         title:{
//             text: "Survey Result"
//         },
//         axisY: {
//             title: ""
//         },
//         data: [{        
//             type: "column",  
//             showInLegend: true, 
//             legendMarkerColor: "grey",
//             legendText: "Question Survey",
//             dataPoints: [      
//                 { y: 300878, label: "Venezuela" },
//                 { y: 266455,  label: "Saudi" },
//                 { y: 169709,  label: "Canada" },
//                 { y: 158400,  label: "Iran" },
//                 { y: 142503,  label: "Iraq" },
//                 { y: 101500, label: "Kuwait" },
//                 { y: 97800,  label: "UAE" },
//                 { y: 80000,  label: "Russia" }
//             ]
//         }]
//     });
//     chart.render();
    
//     }
//     </script> --}}
@endsection