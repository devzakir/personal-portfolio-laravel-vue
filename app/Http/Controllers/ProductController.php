<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;
use App\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|max:2048',
            'link' => 'required',
            'version' => 'required',
            'layout' => 'required',
            'license' => 'required',
            'description' => 'required',
        ]);

        
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move(public_path('uploads/product/'), $image_new_name);
        }

        $product = Product::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'category_id' => $request->category_id,
            'image' => '/uploads/product/' . $image_new_name,
            'price' => $request->price,
            'version' => $request->version,
            'license' => $request->license,
            'layout' => $request->layout,
            'link' => $request->link,
            'description' => $request->description,
            'category_name' => ProductCategory::find($request->category_id)->name,
        ]);

        Session::flash('success', 'Product Created Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,$id)
    {
        $product = Product::find($id);
        if($product){
            return view('admin.product.show', ['product' => $product]);
        } else {
            return redirect()->route('product.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $categories = ProductCategory::all();
        $product = Product::find($id);
        if($product){
            return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
        } else {
            return redirect()->route('product.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'link' => 'required',
            'version' => 'required',
            'layout' => 'required',
            'license' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        if($request->hasFile('image')){
            if(file_exists(public_path($product->image))){
                unlink(public_path($product->image));
            }
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move(public_path('uploads/product/'), $image_new_name);
            $product->image = '/uploads/product/' . $image_new_name;
        }

        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->category_id = $request->category_id;
        $product->link = $request->link;
        $product->price = $request->price;
        $product->version = $request->version;
        $product->layout = $request->layout;
        $product->description = $request->description;
        $product->license = $request->license;
        $product->category_name = ProductCategory::find($request->category_id)->name;
        $product->save();

        Session::flash('success', 'Product Updated Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy(Product $product,$id)
    {
        $product = Product::find($id);
        if(file_exists(public_path($product->image))){
            unlink(public_path($product->image));
        }
        $product->delete();

        Session::flash('success', 'Product Deleted Successfully');
        return redirect()->back();
    }

    public function get_data(){
        $products = Product::latest()->paginate(9);

        return response()->json($products, 200);
    }
}
