@extends('admin.admin_master')
@section('title')
    Add || Authority
@endsection

@section('body')

<div class="container">
    <table class="table table-striped">
       <tbody>
          <tr>
             <td colspan="1">
                <form action="{{route('add_authority')}}" method="POST" class="well form-horizontal">
                    @csrf
                   <fieldset>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Authority Name</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input id="authority_name" name="authority_name" placeholder="Authority Name" class="form-control" required="true" value="" type="text"></div>
                         </div>
                      </div>

                      <div class="form-group">
                         <label class="col-md-4 control-label">Institution Name</label>
                         <div class="col-md-8 inputGroupContainer">
                           <select name="institution_name" class="form-control" >
                               <option value="">--- Select Name ---</option>
                               @foreach ($all_institutions as $institutions)
                                   <option value="{{ $institutions->institution_id }}">{{ $institutions->institution_name }}</option>
                               @endforeach
                           </select>
                       </div>
                      </div>

                      {{-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email-input" class=" form-control-label">Inustitution Name</label>
                        </div>
                        
                    </div> --}}
                 
                      <div class="form-group">
                         <label class="col-md-4 control-label">Authority Email</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <input id="authority_email" name="authority_email" placeholder="Institution Email" class="form-control" required="true" value="" type="email"></div>
                         </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-md-4 control-label">Authority Website URL</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon">
                                   <i class="glyphicon glyphicon-earphone"></i>
                                </span>
                                <input id="website" name="website" placeholder="URL here(Optional)" class="form-control"  value="" type="text"></div>
                        </div>
                     </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Password</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <input id="password" name="password" placeholder="Password" class="form-control" required="true" value="" type="password"></div>
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Authority Phone Number</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-earphone"></i>
                                </span>
                                <input id="phone_number" name="phone_number" placeholder="Phone Number" class="form-control" required="true" value="880" type="text"></div>
                         </div>
                      </div>
                   </fieldset>
                   <button type="submit" class="btn btn-success">Add Authority</button>
                </form>
             </td>
          </tr>
       </tbody>
    </table>
 </div>
@endsection