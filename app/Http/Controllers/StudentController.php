<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
use Session;
use decrypt;
use App\Student;
use Mail;

class StudentController extends Controller
{
    protected function studentImageProcessing(Request $request,$student_name)
    {
            $student_image = $request->file('student_image_show');
            $fileType = $student_image->getClientOriginalExtension();
            $imageName = $student_name.'.'.$fileType;
            $directory = 'uploads/student_images/update_student_images/';
            $student_imageUrl=$directory.$imageName;

            Image::make($student_image)->save($student_imageUrl);
            // dd($student_imageUrl);
            return $student_imageUrl;
    }
    public function update_profile(Request $request)
    {
        // return $request->all();
        $student_name=$request->student_name;
        $student_imageUrl=$this->studentImageProcessing($request,$student_name);

        $institution_infos=DB::table('institutions')
        ->where('institution_id',$request->institution_id)
        ->first();

        $update_studnet=DB::table('students')
        ->where('student_id',$request->student_id)
        ->update([
            'institution_id'=>$request->institution_id,
            'institution_name'=>$institution_infos->institution_name,
            'student_name'=>$request->student_name,
            'student_email'=>$request->student_email,
            'student_image'=>$student_imageUrl,
            'password'=>md5($request->password)
            ]);
            return redirect()->to('/student/profile/'.encrypt($request->student_id));
    }
     protected function profileImageProcessing(Request $request,$student_name)
    {
            $profile_image = $request->file('student_image');
            $fileType = $profile_image->getClientOriginalExtension();
            $imageName = $student_name.'.'.$fileType;
            $directory = 'uploads/student_images/';
            $profile_imageUrl=$directory.$imageName;

            Image::make($profile_image)->save($profile_imageUrl);
            return $profile_imageUrl;
            // dd($certificate_imageUrl);
    }
     protected function CertificateImageProcessing(Request $request,$student_name)
    {
            $certificate_image = $request->file('certificate_image');
            $fileType = $certificate_image->getClientOriginalExtension();
            $imageName = $student_name.'.'.$fileType;
            $directory = 'uploads/certificate_images/';
            $certificate_imageUrl=$directory.$imageName;

            Image::make($certificate_image)->save($certificate_imageUrl);
            return $certificate_imageUrl;
            // dd($certificate_imageUrl);
    }

    protected function SelfiCertificateProcessing(Request $request,$student_name)
    {
            $selfi_certificate = $request->file('selfi_certificate');
            $fileType = $selfi_certificate->getClientOriginalExtension();
            $imageName = $student_name.'.'.$fileType;
            $directory = 'uploads/selfi_certificates/';
            $selfi_certificate_imageUrl=$directory.$imageName;

            Image::make($selfi_certificate)->save($selfi_certificate_imageUrl);
            return $selfi_certificate_imageUrl;
            // dd($selfi_certificate);
    }

    public function account_verify(Request $request)
    {
        $student_pass_check=DB::table('students')
        ->where('student_id',$request->student_id)
        ->where('password',md5($request->password))
        ->first();
        
        if($student_pass_check==true)
        {
            $previous_request_check = $student_pass_check->request_for_verification;

            if($previous_request_check==1)
            {
                return redirect()->back()->with("request_error","You have already request for verification! Wait for confirmation");
            }
            else
            {
                $student_info=DB::table('students')
            ->where('student_id',$request->student_id)
            ->first();
            $student_id=$request->student_id;
            $student_name=$student_info->student_name;
                
            $profile_imageUrl=$this->profileImageProcessing($request,$student_name);
            $certificate_imageUrl=$this->CertificateImageProcessing($request,$student_name);
            $selfi_certificate_imageUrl=$this->SelfiCertificateProcessing($request,$student_name);

            $set_student_info=DB::table('students')
            ->where('student_id',$student_id)
            ->update([
                'student_image'=>$profile_imageUrl,
                'certificate'=>$certificate_imageUrl,
                'selfi_image'=>$selfi_certificate_imageUrl,
                'request_for_verification'=>1
                ]);
            
            return view('student.profile.verify_notification');
            }
            
        }
        else
        {
            return redirect()->back()->with("password_error","Password wrong!");
        }
    }

    public function student_verify_cancel($student_id)
    {
        $id=decrypt($student_id);
       
        $student_info=DB::table('students')
        ->where('student_id',$id)
        ->first();

        $cancelId=DB::table('students')
        ->where('student_id',$id)
        ->update([
            'certificate'=>null,
            'selfi_image'=>null,
            'verified_status' => 0,
            'request_for_verification'=>-1
            ]);

        $to_name=$student_info->student_name;
        $to_email=$student_info->student_email;
        $data=array('name'=>$student_info->student_name,'body'=>"We can't verify your account.Your account information is not valid! Kindly try again");
        Mail::send('verify_cancle_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)
            ->subject('Account Activition Notification');
        });

        toast('Verify cancled sucessfully!','success');
        return redirect()->back();
    }
    public function student_verify($student_id)
    {
        $id=decrypt($student_id);

        $student_info=DB::table('students')
        ->where('student_id',$id)
        ->first();
       
        $verifyId=DB::table('students')
        ->where('student_id',$id)
        ->update([
            'verified_status' => 1,
            'request_for_verification'=>0
            ]);

        $to_name=$student_info->student_name;
        $to_email=$student_info->student_email;
        $data=array('name'=>$student_info->student_name,'body'=>"Your Account Is Verified!Thanks for being with us");
        Mail::send('mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)
            ->subject('Account Activition Notification');
        });

        return redirect()->back()->with('verify_success_message','Verified Successfully');
    }
    public function student_logout()
    {
        Session::flush();
        return redirect('/student/login');
    }
    public function student_login(Request $request)
    {
       
        $student_email = $request->student_email;
        $password = md5($request->password);

        $loginStatus = DB::table('students')
            ->where('student_email', $student_email)
            ->where('password', $password)
            ->first();

                if($loginStatus==true)
                {
                    // $verified_status=$loginStatus->verified_status;
                    // if($verified_status==0)
                    //     {
                    //         return redirect()->back()->with('loginStatusMessage','Your accont is not active yet!');
                    //     }
                    // else
                    // {
                    Session::put('student_name', $loginStatus->student_name);
                    Session::put('student_id', $loginStatus->student_id);
                    return redirect('/student/dashboard');
                    // }
                }
                else 
                {
                   return redirect('/student/login')->with('login_error','Please fill the information correctly');
                   // return redirect($request->session()->get('url.intended'));
                }
    }
   
    // protected function CertificateImageProcessing(Request $request)
    // {
    //         $certificate_image = $request->file('certificate_image');
    //         $fileType = $certificate_image->getClientOriginalExtension();
    //         $imageName = $request->student_name.'.'.$fileType;
    //         $directory = 'uploads/certificate_images/';
    //         $certificate_imageUrl=$directory.$imageName;

    //         Image::make($certificate_image)->save($certificate_imageUrl);
    //         return $certificate_imageUrl;
    // }

    // protected function SelfiCertificateProcessing(Request $request)
    // {
    //         $selfi_certificate = $request->file('selfi_certificate');
    //         $fileType = $selfi_certificate->getClientOriginalExtension();
    //         $imageName = $request->student_name.'.'.$fileType;
    //         $directory = 'uploads/selfi_certificates/';
    //         $selfi_certificate_imageUrl=$directory.$imageName;

    //         Image::make($selfi_certificate)->save($selfi_certificate_imageUrl);
    //         return $selfi_certificate_imageUrl;
    //         // dd($selfi_certificate);
    // }

    public function student_register(Request $request)
    {
        // $certificate_imageUrl=$this->CertificateImageProcessing($request);
        // $selfi_certificate_imageUrl=$this->SelfiCertificateProcessing($request);

        $institutionId=DB::table('institutions')
        ->where('institution_id',$request->institution_name)
        ->first();

        $DuplicateEmailCheck=DB::table('students')
        ->where('student_email',$request->student_email)
        ->count();

        if($DuplicateEmailCheck==0)
        {
            if($request->institution_name==0)
            {
                $addnewStudent=DB::table('students')->insert([
                    'institution_id'=>0,
                    'institution_name'=>'Not Admited',
                    'student_name'=>$request->student_name,
                    'student_email'=>$request->student_email,
                    // 'certificate'=>$certificate_imageUrl,
                    // 'selfi_image'=>$selfi_certificate_imageUrl,
                    'password'=>md5($request->password),
                 ]);
                 return view('front_end.register_form.welcome_notification')->with('registration_success','Your info is registred!');
            }
            else
            {
                $addnewStudent=DB::table('students')->insert([
                    'institution_id'=>$institutionId->institution_id,
                    'institution_name'=>$institutionId->institution_name,
                    'student_name'=>$request->student_name,
                    'student_email'=>$request->student_email,
                    // 'certificate'=>$certificate_imageUrl,
                    // 'selfi_image'=>$selfi_certificate_imageUrl,
                    'password'=>md5($request->password),
                 ]);
                return view('front_end.register_form.welcome_notification')->with('registration_success','Your info is registred!');
            }
        }
        else
        {
            return redirect()->back()->with('email_error','This email is already used');
        }
    }
}
