<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use DB;

class CartController extends Controller
{
    public function addCart(Request $req){
       $qty = $req->qty;
       $product_id = $req->product_id;
       $product = DB::table('tbl_products')
                  ->where('id', $product_id)
                  ->first();
                  $data['qty'] = $qty;
                  $data['id'] = $product->id;
                  $data['name'] = $product->product_name;
                  $data['price'] = $product->product_prize;
                  $data['weight'] = 200;
                  $data['options']['product_image'] = $product->product_image;

                  Cart::add($data);
                  return Redirect::to('/show_cart');

    }
     public function showCart(){
       $category = DB::table('tbl_categories')
                   ->where('publication_status', 1)
                   ->get();
                   return view('frontend.cart');

    }
     public function deleteCartItem($rowId){
       Cart::update($rowId, 0);
       return Redirect()->back();
    }
     public function updateCartItem(Request $req){
      $qty = $req->qty;
      $rowid = $req->rowid;
       Cart::update($rowid, $qty);
       return Redirect()->back();
    }
}
