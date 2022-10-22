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
    public function inactive_manufacture($manufacture_id)
    {
       DB::table('manufactures')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>0]);
       Session::put('message','manufacture Inactive Successfully !!');
       return Redirect::to('/all-manufacture');
    }
    public function active_manufacture($manufacture_id)
    {
       DB::table('manufactures')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>1]);
       Session::put('message','manufacture Activated Successfully !!');
       return Redirect::to('/all-manufacture');
    }
    public function edit_manufacture($manufacture_id)
    {
          $result=DB::table('manufactures')->where('manufacture_id',$manufacture_id)->first();
          return view('admin.edit_manufacture',compact('result'));
    }
    public function update_manufacture(Request $request,$manufacture_id)
    {
        $datas=array();
        $datas['manufacture_name']=$request->manufacture_name;
        $datas['manufacture_description']=$request->manufacture_description;
        DB::table('manufactures')->where('manufacture_id',$manufacture_id)->update($datas);
        Session::put('message','manufacture Updated Successfully !! ');
        return Redirect::to('/all-manufacture');
    }

}
