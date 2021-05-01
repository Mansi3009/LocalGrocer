<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\models\Category;

class ProductController extends Controller
{
    public function productview()
    {
    	//return view('product');
        $category = Category::all();
        return view('product',['categoris'=>$category]);   
    }
    public function addProduct(Request $request)
    {
    	//print_r($request->input());
		$product = new ProductModel;
        $product->category_id=$request->category;
        $product->product_name=$request->product_name;
        $product->product_description=$request->product_description;
        
        if ($request->hasfile('product_image'))
        {
        	$file = $request->file('product_image');
        	$extension = $file->getClientOriginalExtension();
        	$filename = time() . '-' . $extension;
        	$file->move('upload/product/', $filename);
        	$product->product_image = $filename;
        }
        else
        {
        	return $request;
  	       	$product->product_image = '';
        }

        $product->product_status=$request->product_status;
        $product->product_price=$request->product_price;
        $product->product_discount=$request->product_discount;
      	
        $product->save();
        return redirect()->route('productview');
    }

    public function index()
    {
    	$product = ProductModel::paginate(5);
    	return view('viewproduct',['product'=>$product]);
    }

    public function deleteproduct($id)
    {
        ProductModel::where('id',$id)->delete();    
        return redirect('view-product');
    }

    public function showproduct($id)
    {
       	$product = ProductModel::where('id',$id)->first();
    	return view('editproduct',['product'=>$product]);
    }
    public function updateproduct(Request $req)
    {
        //return $req->input();
        $product = ProductModel::find($req->productid);
     	//dd($req->id);   
        $product->product_name=$req->product_name;  
        $product->product_description=$req->product_description;
        
        if ($req->hasfile('product_image'))
        {
            $file = $req->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-' . $extension;
            $file->move('upload/product/', $filename);
            $product->product_image = $filename;
        }
        
        $product->product_status=$req->product_status;
        $product->product_price=$req->product_price;
        $product->product_discount=$req->product_discount;
        //$product->product_status=$req->product_detail;
        $product->save();
      	
        return redirect('view-product');
    }

    public function productdisplay()
    {
        $product = ProductModel::all();
        //dd($product);
        return view('productdisplay',['product'=>$product]);   
    }
    
    public function viewcategory($id)
    {
        $products = ProductModel::find($id);
        //dd($products);
        return view('/productdisplay',['products'=>$products]);
    }  
    
    public function show($id)
    {
        $users = RegModel::find($id);
        return view('/editvendor',['users'=>$users]);
    }
}