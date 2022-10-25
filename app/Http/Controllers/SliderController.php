<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\slider;
use DB;
use Session;
Session_start();

class SliderController extends Controller
{
    public function index(){
        return view ('admin.add_slider');
    }
    public function save_slider(Request $request){

            $data=$request->all();
            $slider= new slider();

            $slider->publication_status = $data['publication_status'];
            if($request->hasfile('slider_image')){
                $file=$request->file('slider_image');
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('slider/',$filename);
                $slider->slider_image=$filename;
                }
                $slider->save();
                // DB::table('products')->insert('$data');

                Session::put('message','Slider Added Successfully');
                return Redirect::to('/add-slider');
                if(!$image){
                    Session::put('message','Slider Added Successfully without Image !!');
                    return Redirect::to('/add-slider');
                }


    }
    public function all_slider(){
             $result= DB::table('sliders')->get();
             return view('admin.all_slider',compact('result'));

     }
     public function inactive_slider($slider_id)
    {
       DB::table('sliders')->where('slider_id',$slider_id)->update(['publication_status'=>0]);
       Session::put('message','Slider Inactive Successfully !!');
       return Redirect::to('/all-slider');
    }
    public function active_slider($slider_id)
    {
       DB::table('sliders')->where('slider_id',$slider_id)->update(['publication_status'=>1]);
       Session::put('message','slider Activated Successfully !!');
       return Redirect::to('/all-slider');
    }
    public function delete_slider($slider_id){
        DB::table('sliders')->where('slider_id',$slider_id)->delete();
        Session::put('message','Slider deleted Successfully !!');
        return Redirect::to('/all-slider');
    }
}
