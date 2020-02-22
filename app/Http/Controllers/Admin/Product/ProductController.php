<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Product;
use Illuminate\Support\Facades\Redirect;
use DB;
use Imagick;
class ProductController extends Controller
{
    public function product(){
      $product = DB::table('tbl_products')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.id')
           ->select('tbl_products.*','tbl_categories.category_name','tbl_manufacture.manufacture_name')
            ->get();
    return view('backend.product.all_product', compact('product'));
    }
    public function addProduct(){
    	return view('backend.product.add_product');
    }
    public function insertProduct(Request $req){
   	  $validatedData = $req->validate([
        'product_name' => 'required|max:55',
        'product_size' => 'required',
        'product_color' => 'required',
        'product_prize' => 'required',
        'category' => 'required',
        'manufacture' => 'required',
        'product_image' => 'image|mimes:jpeg,png,jpg,|max:1000',
        

    ]);
   	  $product = new Product;
   	  $product->product_name = $req->product_name;
   	  $product->category_id = $req->category;
   	  $product->manufacture_id = $req->manufacture;
   	  $product->product_short_description = $req->product_short_description;
   	  $product->product_long_description = $req->product_long_description;
   	  $product->product_prize = $req->product_prize;
   	  $product->product_size = $req->product_size;
   	  $product->product_color = $req->product_color;
   	  $product->publication_status = $req->publication_status;
   	  $image=$req->file('product_image');
              if ($image) {
                $image_name=hexdec(uniqid());
                $ext= strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/frontend/productimg/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if ($success) {
                $product->product_image=$image_url;
                $notification=array(
                'messege'=>'image successfully inserted',
                'alert-type'=>'success'
            	);	
                }else{
                	$product->product_image = '';
                	$notification=array(
                'messege'=>'image not inserted',
                'alert-type'=>'error'
            	);	
                }
            }
   	  $product->save();
   	  if ($product) {
       	$notification=array(
         'messege'=>'product successfully inserted',
         'alert-type'=>'success'
       	);
       	return Redirect()->route('product')->with($notification);
       }else{
       	$notification=array(
         'messege'=>'something worng',
         'alert-type'=>'error'
       	);
       	return Redirect()->back()->with($notification);

       }
   }
   public function inactiveProduct($id){
   	 $Product = Product::findorfail($id)
   	 ->where('id', $id)
   	 ->update(['publication_status' => 0]);
       	return Redirect()->back();
   }
   public function activeProduct($id){
   	 $Product = Product::findorfail($id)
   	 ->where('id', $id)
   	 ->update(['publication_status' => 1]);
       	return Redirect()->back();
   }
   public function deleteProduct($id){
   	 $product = Product::findorfail($id)
   	 ->where('id', $id)
   	 ->delete();
   	 $notification=array(
         'messege'=>'Product successfully Deleted',
         'alert-type'=>'success'
       	);
       	return Redirect()->back()->with($notification);
   }
   public function editProduct($id){
   	 $product = Product::findorfail($id);
   	 return view('backend.product.edit_product', compact('product'));
   }

}
