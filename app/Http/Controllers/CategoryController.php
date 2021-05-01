<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductModel;


class CategoryController extends Controller
{
	public function categoryview()
    {
    	return view('category');
    }
    
    public function addCategory(Request $request)
    {
    	//print_r($request->input());
		$categorys = new Category;

        $categorys->c_name=$request->c_name;

        if ($request->hasfile('c_image'))
        {
        	$file = $request->file('c_image');
        	$extension = $file->getClientOriginalExtension();
        	$filename = time() . '-' . $extension;
        	$file->move('upload/category/', $filename);
        	$categorys->c_image = $filename;
        }
        else
        {
        	return $request;
  	       	$categorys->c_image = '';
        }
        
        $categorys->save();
        return redirect()->route('categoryview');
        
    }

    public function index()
    {
    	$categorys = Category::paginate(5);
    	return view('viewcategory',compact('categorys'));
    }

    public function deletecategory($id)
    {
        Category::where('id',$id)->delete();    
        return redirect('viewcategory');
    }

    public function showcategory($id)
    {
       	$category = Category::where('id',$id)->first();
    	return view('editcategory',['category'=>$category]);
    }
    public function updatecategory(Request $req)
    {
        //return $req->input();

        $category = Category::find($req->categoryid);
     	//dd($req->id);   
        $category->c_name=$req->c_name;  
        
        if ($req->hasfile('c_image'))
        {
        	$file = $req->file('c_image');
        	$extension = $file->getClientOriginalExtension();
        	$filename = time() . '-' . $extension;
        	$file->move('upload/category/', $filename);
        	$category->c_image = $filename;
        }
        $category->save();
      	
        return redirect('viewcategory');
    }


    public function categorydisplay()
    {
        $category = Category::all();
        return view('categorydisplay',['category'=>$category]);   
    }

    public function viewcategory($id)
    {
    	//$products = ProductModel::find($id);
    	$products = ProductModel::where('category_id',$id)->get(); 
    	$category = Category::all();
    	//dd($products);
        return view('categorydisplay',compact('products','category'));
        //return view('productdisplay',compact('products'));
    }
}
