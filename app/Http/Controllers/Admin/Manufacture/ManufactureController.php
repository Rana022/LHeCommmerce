<?php

namespace App\Http\Controllers\Admin\Manufacture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Manufacture;


class ManufactureController extends Controller
{
    public function manufacture(){
    	$manufacture = Manufacture::all();
    	return view('backend.manufacture.manufacture', compact('manufacture'));
    }
     public function addManufacture(){
    	return view('backend.manufacture.add_manufacture');
    }
    public function insertManufacture(Request $req){
   	  $validatedData = $req->validate([
        'manufacture_name' => 'required|unique:tbl_manufacture|max:55',
    ]);
   	  $manufacture = new Manufacture;
   	  $manufacture->manufacture_name = $req->manufacture_name;
   	  $manufacture->publication_status = $req->publication_status;
   	  $manufacture->save();
   	  if ($manufacture) {
       	$notification=array(
         'messege'=>'manufacture successfully inserted',
         'alert-type'=>'success'
       	);
       	return Redirect()->route('manufacture')->with($notification);
       }else{
       	$notification=array(
         'messege'=>'something worng',
         'alert-type'=>'error'
       	);
       	return Redirect()->back()->with($notification);

       }
   }
     public function inactiveManufacture($id){
   	 $manufacture = Manufacture::findorfail($id)
   	 ->where('id', $id)
   	 ->update(['publication_status' => 0]);
       	return Redirect()->back();
   }
   public function activeManufacture($id){
   	 $manufacture = Manufacture::findorfail($id)
   	 ->where('id', $id)
   	 ->update(['publication_status' => 1]);
       	return Redirect()->back();
   }
   public function deleteManufacture($id){
   	 $manufacture = Manufacture::findorfail($id)
   	 ->where('id', $id)
   	 ->delete();
   	 $notification=array(
         'messege'=>'Manufacture successfully Deleted',
         'alert-type'=>'success'
       	);
       	return Redirect()->back()->with($notification);

   }
   public function editManufacture($id){
   	 $manufacture = Manufacture::findorfail($id);
   	 return view('backend.manufacture.edit_manufacture', compact('manufacture'));
   }
   public function updateManufacture(Request $req, $id){
   	  $validatedData = $req->validate([
        'manufacture_name' => 'required|unique:tbl_manufacture|max:55',
    ]);
   	  $manufacture = Manufacture::findorfail($id);
   	  $manufacture->manufacture_name = $req->manufacture_name;
   	  $manufacture->publication_status = $req->publication_status;
   	  $manufacture->save();
   	  if ($manufacture) {
       	$notification=array(
         'messege'=>'manufacture successfully Updated',
         'alert-type'=>'success'
       	);
       	return Redirect()->route('manufacture')->with($notification);
       }else{
       	$notification=array(
         'messege'=>'something worng',
         'alert-type'=>'error'
       	);
       	return Redirect()->back()->with($notification);

       }
   }
}
