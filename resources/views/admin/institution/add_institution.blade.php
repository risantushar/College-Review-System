@extends('admin.admin_master')
@section('title')
    Add || Institution
@endsection
@section('body')
<div class="container">
    <table class="table table-striped">
       <tbody>
          <tr>
             <td colspan="1">
                <form action="{{route('add_institution')}}" method="POST" class="well form-horizontal" enctype="multipart/form-data">
                    @csrf
                   <fieldset>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Institution Name</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <input id="institution_name" name="institution_name" placeholder="Institution Name" class="form-control" required="true" value="" type="text"></div>
                         </div>
                      </div>
                 
                      <div class="form-group">
                         <label class="col-md-4 control-label">Institution Email</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <input id="institution_email" name="institution_email" placeholder="Institution Email" class="form-control" required="true" value="" type="email"></div>
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">EIIN Number</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <input id="institution_eiin" name="institution_eiin" placeholder="Institution EIIN Number" class="form-control" required="true" value="" type="number"></div>
                         </div>
                      </div>

                      <div class="form-group">
                         <label class="col-md-4 control-label">Institution Decription</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                <textarea id="institution_description" name="institution_description"  class="form-control" required="true" value="" type="email">
                                </textarea>
                                </div>
                         </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-md-4 control-label">Website URL</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon">
                                   <i class="glyphicon glyphicon-earphone"></i>
                                </span>
                                <input id="website" name="website" placeholder="URL here" class="form-control" required="true" value="http://" type="text"></div>
                        </div>
                     </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Phone Number</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-earphone"></i>
                                </span>
                                <input id="phone_number" name="phone_number" placeholder="Phone Number" class="form-control" required="true" value="880" type="text"></div>
                         </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Institution Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input required type="file" id="institution_image" name="institution_image" class="form-control-file">
                        </div>
                    </div>
                    <div class="row form-group justify-content-center" >
                        <img id="showImage" class="img-fluid" style="height: 400px;width:500px" src="" alt="" >
                    </div>
                   </fieldset>
                   <button type="submit" class="btn btn-success">Add Institution</button>
                </form>
             </td>
          </tr>
       </tbody>
    </table>
 </div>

  
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script >
     $('#institution_image').change(function (e) {
         var reader=new FileReader();
         reader.onload=function (e) {
             $('#showImage').attr('src',e.target.result);
         }
         reader.readAsDataURL(e.target.files['0']);
 
         });
   </script>
@endsection