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
    public function inactive_category($category_id)
    {
       DB::table('tbl_categories')->where('category_id',$category_id)->update(['publication_status'=>0]);
       Session::put('message','Category Inactive Successfully !!');
       return Redirect::to('/all-category');
    }
    public function active_category($category_id)
    {
       DB::table('tbl_categories')->where('category_id',$category_id)->update(['publication_status'=>1]);
       Session::put('message','Category Activated Successfully !!');
       return Redirect::to('/all-category');
    }
    public function edit_category($category_id)
    {
          $result=DB::table('tbl_categories')->where('category_id',$category_id)->first();
          return view('admin.edit_category',compact('result'));
    }
    public function update_category(Request $request,$category_id)
    {
        $datas=array();
        $datas['category_name']=$request->category_name;
        $datas['category_description']=$request->category_description;
        DB::table('tbl_categories')->where('category_id',$category_id)->update($datas);
        Session::put('message','Category Updated Successfully ! ');
        return Redirect::to('/all-category');
    }
    public function delete_category($category_id){
        DB::table('tbl_categories')->where('category_id',$category_id)->delete();
        Session::put('message','Category deleted Successfully !!');
        return Redirect::to('/all-category');
    }

}
