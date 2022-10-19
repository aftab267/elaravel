<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Session;
Session_start();


class CategoryController extends Controller

{
    public function index(){
           return view('admin.add_category');
    }

    public function all_category(){
       $result= DB::table('tbl_categories')->get();
            return view('admin.all_category',compact('result'));

    //    return view('admin.all_category');
    }
    public function save_category(Request $request)
    {
            $request->validate([
                'category_name'=> 'required',
                'category_description'=> 'required',
                'publication_status'=> 'required',
            ]);

            $data=array();
            $data['category_id']=$request->category_id;
            $data['category_name']=$request->category_name;
            $data['category_description']=$request->category_description;
            $data['publication_status']=$request->publication_status;
        //    echo  "<pre>";
        //      print_r($data);
        //     echo "</pre>";
        DB::table('tbl_categories')->insert($data);
        Session::put('message','Cateroty Added Successfully.');
        return Redirect::to('/add-category');

    }

}
