<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
Session_start();

class AdminController extends Controller
{
    public function index(){
     return view('admin_login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
           $admin_email=$request->admin_email;
           $admin_password=$request->admin_password;
           $result=DB::table('tbl_admins')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        //     echo "<pre>";
        //     print_r($result);

           if($result){
               Session::put('admin_name',$request->admin_name);
               Session::put('admin_id',$request->admin_id);
               return Redirect::to('/dashboard');
           }else{
               Session::put('messege','Email or Password Invalid!');
               return Redirect::to('/admin');
           }
    }
}
