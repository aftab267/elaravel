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
            public function all_product()
            {
                $result= DB::table('products')
                ->join('tbl_categories','products.category_id','=','tbl_categories.category_id')
                ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                ->select('products.*','tbl_categories.category_name','manufactures.manufacture_name')
                ->get();
                return view('admin.all_product',compact('result'));
            }
            public function save_product(Request $request)
            {
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
            $file->move('image/',$filename);
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
            public function inactive_product($product_id)
            {
                DB::table('products')->where('product_id',$product_id)->update(['publication_status'=>0]);
                Session::put('message','Product Inactive Successfully !!');
                return Redirect::to('/all-product');
            }
            public function active_product($product_id)
            {
            DB::table('products')->where('product_id',$product_id)->update(['publication_status'=>1]);
            Session::put('message','Product Activated Successfully !!');
            return Redirect::to('/all-product');

        }
        public function delete_product($product_id){
            DB::table('products')->where('product_id',$product_id)->delete();
            Session::put('message','Product deleted Successfully !!');
            return Redirect::to('/all-product');
        }
        public function edit_product($product_id)
    {
          $result=DB::table('products')->where('product_id',$product_id)->first();
          return view('admin.edit_product',compact('result'));
    }
    public function update_product(Request $request,$product_id)
    {
        $datas=array();
        $datas['product_name']=$request->product_name;
        $datas['product_short_description']=$request->product_short_description;
        $datas['product_price']=$request->product_price;
        DB::table('products')->where('product_id',$product_id)->update($datas);
        Session::put('message','Product Updated Successfully ! ');
        return Redirect::to('/all-product');
    }


}






