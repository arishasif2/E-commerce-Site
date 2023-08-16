<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    // Category Section
    public function category(){
        $category=DB::table('categories')->get();
        return view('admin.category',['category'=>$category]);
    }
    public function create(Request $req){
        $data=new Category;
        $data->name=$req->name;
        $data->save();
        return redirect()->back()->with('message','Added Successfully');
    }

    public function destroy(string $id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    // Products Section
    public function view_product(){
        $category=DB::table('categories')->get();
        return view('admin.product',compact('category'));
    }
    public function create_product(Request $req){
        $product=new Product;
        $product->title=$req->title;
        $product->description=$req->description;
        $product->quantity=$req->quantity;
        $product->price=$req->price;
        $product->discount_price=$req->discount_price;
        $product->category=$req->category;
        $image=$req->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function show_product(){
        $product=DB::table('products')->get();
        return view('admin.display_product',['product'=>$product]);
    }
    public function delete_product(string $id)
    {
        DB::table('products')->where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function edit(string $id)
    {
        $product=Product::find($id);
        $category=Category::all();
        return view('admin.editproduct',compact('product','category'))->with('message','Updated Successfully');
    }

    public function update(Request $req, string $id)
    {
        $product=Product::find($id);   //Model name if like this
        $product->title=$req->title;
        $product->description=$req->description;
        $product->quantity=$req->quantity;
        $product->price=$req->price;
        $product->discount_price=$req->discount_price;
        $product->category=$req->category;
        $image=$req->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $req->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();
        return redirect(route('show_product'))->with('message','Updated Successfully');
    }
}