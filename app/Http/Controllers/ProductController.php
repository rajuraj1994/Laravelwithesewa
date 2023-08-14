<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add_category_form()
    {
        return view('addcategory');
    }
    public function store_category(Request $request)
    {
        Category::create([
            'category_name'=>$request->get('category')
        ]);
        $request->session()->flash('msg','category inserted');
        return redirect()->back();
    }
    public function show_category()
    {
        $categorylist=Category::orderBy('id','desc')->get();
        return view('showcategory',['categories'=>$categorylist]);
    }

    public function edit_category($id)
    {
        $category=Category::find($id);
        return view('editcategory',compact('category'));
    }
    public function update_category(Request $request,$id)
    {
        $category=Category::find($id);
        $category->update([
            'category_name'=>$request->get('category') 
        ]);
        $request->session()->flash('msg','category updated');
        return redirect()->route('categorylist');

    }

    public function delete_category(Request $request,$id)
    {
        $category=Category::find($id);
        $category->delete();
        $request->session()->flash('msg','category deleted');
        return redirect()->back();
    }

    public function add_product_form()
    {
        $categories=Category::orderBy('id','asc')->get();
        return view('addproduct',compact('categories'));
    }

    public function store_product(Request $request)
    {
        $image=null;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $image=mt_rand(1001,99999).'_'.$file->getClientOriginalName();
            $file->move('uploads/',$image);
        }
        Product::create([
            'product_name'=>$request->get('pname'),
            'product_price'=>$request->get('price'),
            'stock'=>$request->get('stock'),
            'product_description'=>$request->get('desc'),
            'product_image'=>$image,
            'category_id'=>$request->get('category')
        ]);
        $request->session()->flash('msg','product inserted');
        return redirect()->back();
    }

    public function show_product(){
        $products=Product::orderBy('id','desc')->get();
        return view('showproduct',['products'=>$products]);
    }

    public function edit_product($id){
        $categories=Category::orderBy('id','asc')->get();
        $product=Product::find($id);
        return view('editproduct',compact('product','categories'));
    }
    public function delete_product(Request $request,$id){
        $product=Product::find($id);
        // remove old image
        if($product->product_image){
            unlink('uploads/'.$product->product_image);
        }
        $product->delete();
        $request->session()->flash('msg','product deleted');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
