<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student || Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body {
    background-color: #f2f7fb
}

.mt-100 {
    margin-top: 100px
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 0 5px 0 rgba(43, 43, 43, .1), 0 11px 6px -7px rgba(43, 43, 43, .1);
    box-shadow: 0 0 5px 0 rgba(43, 43, 43, .1), 0 11px 6px -7px rgba(43, 43, 43, .1);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}

.card .card-header {
    background-color: transparent;
    border-bottom: none;
    padding: 20px;
    position: relative
}

.card .card-header h5:after {
    content: "";
    background-color: #d2d2d2;
    width: 101px;
    height: 1px;
    position: absolute;
    bottom: 6px;
    left: 20px
}

.card .card-block {
    padding: 1.25rem
}

.dropzone.dz-clickable {
    cursor: pointer
}

.dropzone {
    min-height: 80px;
    border: 1px solid rgba(42, 42, 42, 0.05);
    background: rgba(204, 204, 204, 0.15);
    padding: 20px;
    border-radius: 5px;
    -webkit-box-shadow: inset 0 0 5px 0 rgba(43, 43, 43, 0.1);
    box-shadow: inset 0 0 5px 0 rgba(43, 43, 43, 0.1)
}

.m-t-20 {
    margin-top: 20px
}

.btn-primary,
.sweet-alert button.confirm,
.wizard>.actions a {
    background-color: #4099ff;
    border-color: #4099ff;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all ease-in .3s;
    transition: all ease-in .3s
}

.btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 10px 19px;
    cursor: pointer
}
</style>
<body>
    @if(session('email_error'))
    <div class="alert alert-danger">
        {{session('email_error')}}
    </div>
    
@endif
    <div class="container-fluid mt-80">
        <div class="row " >
            <div class="col-3"></div>
            <div class="col-8">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h3><legend style="text-transform: uppercase">Student Register Form</legend></h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('student_register')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="text-input" name="student_name" placeholder="Name" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="email" id="student_email" name="student_email" placeholder="Enter Email" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Inustitution Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="institution_name" class="form-control" >
                                            <option value="">--- Select Name ---</option>
                                            <option value="Not Admited">Not Admited Yet!</option>
                                            @foreach ($all_institutions as $institutions)
                                                <option value="{{ $institutions->institution_id }}">{{ $institutions->institution_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Certificate Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="file" id="certificate_image" name="certificate_image" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group justify-content-center" >
                                    <img id="showImage" class="img-fluid" src="{{asset('/front_end/interface/images/certificate.jpg')}}" alt="" >
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Image with Certificate</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="file" id="selfi_certificate" name="selfi_certificate" multiple="" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group justify-content-center" >
                                    <img id="selfi_certificate_show" class="img-fluid" src="{{asset('/front_end/interface/images/verifycertificate.jpg')}}" alt="">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="password" id="password" name="password" placeholder="Enter your password" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Register
                                    </button>
                                    <button type="reset" class="btn btn-warning btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                    <a href="{{route('/')}}" type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Cancle
                                    </a>
                                </div>  
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
          </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script >
        $('#certificate_image').change(function (e) {
            var reader=new FileReader();
            reader.onload=function (e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
    
            });
        $('#selfi_certificate').change(function (e) {
            var reader=new FileReader();
            reader.onload=function (e) {
                $('#selfi_certificate_show').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
    
            })
      </script>
</body>
</html>