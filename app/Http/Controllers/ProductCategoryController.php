<?php

namespace App\Http\Controllers;

use Session;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.product-category.index', ['categories' => $categories]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = ProductCategory::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]);

        Session::flash('success', 'Product Category Created Successfully');
        return redirect()->route('product.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory, $id)
    {
        $category = ProductCategory::find($id);
        return view('admin.product-category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory, $id)
    {
        $category = ProductCategory::find($id);
        return view('admin.product-category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = ProductCategory::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        Session::flash('success', 'Product Category Updated Successfully');
        return redirect()->route('product.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory, $id)
    {
        $category = ProductCategory::find($id);
        $category->delete();

        Session::flash('success', 'Product Category Deleted Successfully');
        return redirect()->back();
    }
}
