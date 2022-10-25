<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Session;
Session_start();

class HomeController extends Controller
{
       public function index()
    {
        $result= DB::table('products')
        ->join('tbl_categories','products.category_id','=','tbl_categories.category_id')
        ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
        ->select('products.*','tbl_categories.category_name','manufactures.manufacture_name')
        ->where('products.publication_status',1)
        ->limit(6)
        ->get();
        return view('pages.home_content',compact('result'));
        // return view('pages.home_content');
    }


   }

