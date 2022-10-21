<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
Session_start();

class ManufactureController extends Controller
{
    public function index()
    {
        return view('admin.add_manufacture');
    }
    public function all_manufacture(){
        $result= DB::table('manufactures')->get();
             return view('admin.all_manufacture',compact('result'));

     //    return view('admin.all_category');
    }
    public function save_manufacture(Request $request)
    {
        $request->validate([
            'manufacture_name'=> 'required',
            'manufacture_description'=> 'required',
            'publication_status'=> 'required',
        ]);

        $data=array();
        $data['manufacture_id']=$request->manufacture_id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;
    //    echo  "<pre>";
    //      print_r($data);
    //     echo "</pre>";
    DB::table('manufactures')->insert($data);
    Session::put('message','Manufacture Added Successfully.');
    return Redirect::to('/add-manufacture');
    }
    public function delete_manufacture($manufacture_id){
        DB::table('manufactures')->where('manufacture_id',$manufacture_id)->delete();
        Session::put('message','manufacture deleted Successfully !!');
        return Redirect::to('/all-manufacture');
    }

}
