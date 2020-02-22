<?php
namespace App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\Category\categoriesController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
class categoriesController extends Controller
{
   public function category(){
   	$category = Category::all();

   	 return view('backend.category.all_category', compact('category'));
   }
   public function addCategory(){
   	 return view('backend.category.add_category');
   }
   public function insertCategory(Request $req){
   	  $validatedData = $req->validate([
        'category_name' => 'required|unique:tbl_categories|max:55',
    ]);
   	  $category = new Category;
   	  $category->category_name = $req->category_name;
   	  $category->publication_status = $req->publication_status;
   	  $category->save();
   	  if ($category) {
       	$notification=array(
         'messege'=>'category successfully inserted',
         'alert-type'=>'success'
       	);
       	return Redirect()->route('category')->with($notification);
       }else{
       	$notification=array(
         'messege'=>'something worng',
         'alert-type'=>'error'
       	);
       	return Redirect()->back()->with($notification);

       }
   }
   public function inactiveCategory($id){
   	 $category = Category::findorfail($id)
   	 ->where('id', $id)
   	 ->update(['publication_status' => 0]);
       	return Redirect()->back();
   }
   public function activeCategory($id){
   	 $category = Category::findorfail($id)
   	 ->where('id', $id)
   	 ->update(['publication_status' => 1]);
       	return Redirect()->back();
   }
   public function deleteCategory($id){
   	 $category = Category::findorfail($id)
   	 ->where('id', $id)
   	 ->delete();
   	 $notification=array(
         'messege'=>'category successfully Deleted',
         'alert-type'=>'success'
       	);
       	return Redirect()->back()->with($notification);

   }
   public function editCategory($id){
   	 $category = Category::findorfail($id);
   	 return view('backend.category.edit_category', compact('category'));
   }
   public function updateCategory(Request $req, $id){
   	  $validatedData = $req->validate([
        'category_name' => 'required|unique:tbl_categories|max:55',
    ]);
   	  $category = Category::findorfail($id);
   	  $category->category_name = $req->category_name;
   	  $category->publication_status = $req->publication_status;
   	  $category->save();
   	  if ($category) {
       	$notification=array(
         'messege'=>'category successfully Updated',
         'alert-type'=>'success'
       	);
       	return Redirect()->route('category')->with($notification);
       }else{
       	$notification=array(
         'messege'=>'something worng',
         'alert-type'=>'error'
       	);
       	return Redirect()->back()->with($notification);

       }
   }

}
