<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Session;
Session_start();

class ProductController extends Controller
{
   public function index()
   {
        return view('admin.add_product');
   }
   public function save_product(Request $request)
   {
    //    $data=array();
    //    $data['product_name']=$request->product_name;
    //    $data['category_id']=$request->category_id;
    //    $data['manufacture_id']=$request->manufacturey_id;
    //    $data['product_short_description']=$request->product_short_description;
    //    $data['product_long_description']=$request->product_long_description;
    //    $data['product_price']=$request->product_price;
    //    $data['product_size']=$request->product_size;
    //    $data['product_colour']=$request->product_colour;
    //    $data['publication_status']=$request->publication_status;
    //    $image=$request->file('product_image');
            $data=$request->all();
            $product= new Product();
            $product->product_name = $data['product_name'];
            $product->category_id = $data['category_id'];
            $product->manufacture_id = $data['manufacture_id'];
            $product->product_short_description = $data['product_short_description'];
            $product->product_long_description = $data['product_long_description'];
            $product->product_price = $data['product_price'];
            $product->product_size = $data['product_size'];
            $product->product_colour = $data['product_colour'];
            $product->publication_status = $data['publication_status'];

            //$student->save();

            if($request->hasfile('product_image')){
            $file=$request->file('product_image');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('student/',$filename);
            $product->product_image=$filename;
            }
            $product->save();
            // DB::table('products')->insert('$data');

            Session::put('message','Product Added Successfully');
            return Redirect::to('/add-product');
            if(!$image){
                Session::put('message','Product Added Successfully without Image !!');
                return Redirect::to('/add-product');
            }

    }





}
