@extends('authority.authority_master')
@section('title')
    Survry || Create
@endsection

@section('body')
<div class="container col-md-6">
    <thead>Survey Create</thead>
    <table class="table table-striped">
       <tbody>
          <tr>
             <td>
                <form action="{{route('create_survey')}}" method="POST" class="well form-horizontal" enctype="multipart/form-data">
                    @csrf
                   <fieldset>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Title</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                @php
                                    $authority_id=Session::get('authority_id');
                                @endphp
                                <input type="hidden" value="{{$authority_id}}" id="authority_id" name="authority_id">
                                <input id="title" name="title" placeholder="Enter title" class="form-control" required="true" value="" type="text"></div>
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Purpose</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <input id="purpose" name="purpose" placeholder="Enter purpose" class="form-control" required="true" value="" type="text"></div>
                         </div>
                      </div>
                   </fieldset>
                   <button type="submit" class="btn btn-success">Create Survey</button>
                </form>
             </td>
          </tr>
       </tbody>
    </table>
 </div>

@endsection