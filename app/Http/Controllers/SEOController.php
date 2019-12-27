<?php

namespace App\Http\Controllers;
use App\SEO;
use Session;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SEO::latest()->get();

        return view('admin.seo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo.create');
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
            'image' => 'sometimes|image|max:2048'
        ]);

        $seo = SEO::create([
            'title' => $request->title,
            'keyword' => $request->keyword,
            'description' => $request->description,
            'meta' => $request->meta,
        ]);

       
        if($request->hasFile('image')){
            if(file_exists(public_path($seo->image))){
                unlink(public_path($seo->image));
            }
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move(public_path('uploads/seo/'), $image_new_name);
            $seo->image = '/uploads/seo/' . $image_new_name;
            $seo->save();
        }

        Session::flash('success', 'SEO data updated successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SEO  $sEO
     * @return \Illuminate\Http\Response
     */
    public function show(SEO $sEO)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SEO  $sEO
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo = SEO::find($id);
        return view('admin.seo.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SEO  $sEO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SEO $sEO)
    {
        $this->validate($request, [
            'image' => 'sometimes|image|max:2048'
        ]);
        
        $seo = $sEO;
        $seo->title = $request->title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->meta = $request->meta;
        $seo->save();
       
        if($request->hasFile('image')){
            if(file_exists(public_path($seo->image))){
                unlink(public_path($seo->image));
            }
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move(public_path('uploads/seo/'), $image_new_name);
            $seo->image = '/uploads/seo/' . $image_new_name;
            $seo->save();
        }

        Session::flash('success', 'SEO data updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SEO  $sEO
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seo = SEO::find($id);
        if($seo){
            $seo->delete();
            Session::flash('success', 'SEO data deleted successfully');
        }
        return redirect()->back();
    }
}
