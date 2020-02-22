<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function show(){
    	$product = DB::table('tbl_products')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.id')
           ->select('tbl_products.*','tbl_categories.category_name','tbl_manufacture.manufacture_name')
           ->where('tbl_products.publication_status', 1)
           ->limit(9)
            ->get();
    	return view('frontend.front_home', compact('product'));
    } 
    public function categoryWise($id){
    	$product = DB::table('tbl_products')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.id')
           ->select('tbl_products.*','tbl_categories.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_categories.id', $id)
            ->get();
    	return view('frontend.categorywise_product', compact('product'));
              } 
               public function manufactureWise($id){
    	$product = DB::table('tbl_products')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.id')
            ->select('tbl_products.*','tbl_categories.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_manufacture.id', $id)
            ->get();
    	return view('frontend.manufacturewise_product', compact('product'));
              } 

      public function productDetails($id){
        $product = DB::table('tbl_products')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.id')
            ->select('tbl_products.*','tbl_categories.category_name','tbl_manufacture.manufacture_name')
                   ->where('tbl_products.id', $id)
                   ->first();
      return view('frontend.product_details', compact('product'));
         
  } 
}
