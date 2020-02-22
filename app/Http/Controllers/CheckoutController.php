<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
class CheckoutController extends Controller
{
   public function logSign(){
   	return view('frontend.log_sign');
   }
   public function userRegistration(Request $req){
   	 $data = array();
   	 $data['customer_name'] = $req->sign_name;
   	 $data['customer_email'] = $req->sign_email;
   	 $data['mobile_number'] = $req->sign_number;
   	 $data['password'] = md5($req->sign_pass);

   	 $customer = DB::table('tbl_customer')
   	             ->insertGetId($data);
   	             Session::put('customer', $customer);
   	             Session::put('customer_name', $req->sign_name);
   	             return Redirect('/checkout');
   }
   public function checkout(){
   	return view('frontend.checkout');
   }
    public function shippingDetails(Request $req){
   	 $data = array();
   	 $data['shipping_email'] = $req->shipping_email;
   	 $data['shipping_first_name'] = $req->shipping_first_name;
   	 $data['shipping_last_name'] = $req->shipping_last_name;
   	 $data['shipping_mobile_number'] = $req->shipping_mobile_number;
   	 $data['shipping_address'] = $req->shipping_address;
   	 $data['shipping_city'] = $req->shipping_city;

   	 $shipping = DB::table('tbl_shipping')
   	             ->insertGetId($data);
   	             Session::put('shipping', $shipping);
   	             return Redirect('/payment');
   }
   public function payment(){

   	return view('frontend.payment');
   }
  public function customerLogin(Request $req){
         $email = $req->log_email;
         $password = md5($req->log_pass);
         $result = DB::table('tbl_customer')
                   ->where('customer_email',$email)
                   ->where('password',$password)
                   ->first();
                   Session::put('customer_id',$result->id);
         if ($result) {
         	return Redirect::to('/checkout');
         }else{
         	return Redirect::to('/log_sign');
         }
                   // echo '<pre>';
                   // print_r($result);
                   // echo '</pre>';
                   // exit();
   }
    public function customerLogout(){
        Session::flush();
        return Redirect('/');
   }
   public function orderPlace(){
        
   }
   public function blog(){
        return view('frontend.blog.blog');
   }
    public function addBlog(){
        return view('backend.blog.add_blog');
   }
    public function insertBlog(Request $req){
       $data = array();
       $data['blog_title'] = $req->blog_title;
       $data['blog_author'] = $req->blog_author;
       $data['blog_details'] = $req->blog_details;
       $data['publication_status'] = $req->publication_status;
       // $image=$req->file('blog_image');
       //        if ($image) {
       //          $image_name=hexdec(uniqid());
       //          $ext= strtolower($image->getClientOriginalExtension());
       //          $image_full_name=$image_name.'.'.$ext;
       //          $upload_path='public/backend/blogimg/';
       //          $image_url=$upload_path.$image_full_name;
       //          $success=$image->move($upload_path,$image_full_name);
       //          if ($success) {
       //          $data['blog_image']=$image_url; 
       //          }else{
       //            $product->product_image = '';
       //          }
       //      }

      $blog = DB::table('tbl_blog')->insert($data);
      if ($blog) {
          $notification=array(
          'messege'=>'Blog successfully inserted',
          'alert-type'=>'success'
          );  
        
      }else{
        $notification=array(
          'messege'=>'Blog not inserted',
          'alert-type'=>'error'
          );  
      }
   }











}

