<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Authority;

class LoginController extends Controller
{
    public function authority_login(Request $request)
    {
        $authority_email = $request->authority_email;
        $password = md5($request->password);

        $authority = DB::table('authorities')
            ->where('authority_email',$authority_email)
            ->where('password', $password)
            ->first();

        if ($authority == true) {
            Session::put('authority_name', $authority->authority_name);
            Session::put('authority_id', $authority->authority_id);
            return redirect('/authority/dashboard');
            // return redirect($request->session()->get('url.intended'));
        } else 
        {
            return redirect('/authority/login')->with('login_failed_message', 'Please Fill correct information');
        }
    }

    public function authority_logout()
    {
        // Session::flush();
        Session::forget('authority_name');
        Session::forget('authority_id');
        return redirect('/authority/login');
    }
    public function admin_logout()
    {
        // Session::flush();
        Session::forget('admin_name');
        Session::forget('admin_id');
        return redirect('/admin/login');
    }
    public function admin_login(Request $request)
    {
        $admin_email = $request->admin_email;
        $password = md5($request->password);

        $result = DB::table('admin')
            ->where('admin_email', $admin_email)
            ->where('password', $password)->first();

        if ($result == true) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
           return redirect('/admin/dashboard');
            // return redirect($request->session()->get('url.intended'));
        } else 
        {
            return redirect('/admin/login')->with('message', 'Please Fill correct information');
        }
    }
}
