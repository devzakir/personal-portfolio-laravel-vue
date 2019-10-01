<?php

namespace App\Http\Controllers;

use Session;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.testimonial.index', ['testimonials' => $testimonials]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'avatar' => 'required|image|max:2048',
        ]);

        $testimonial = Testimonial::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => '/uploads/testimonial',
        ]);

        if($request->hasFile('avatar')){
            $image = $request->avatar;
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/uploads/testimonial/'), $image_new_name);
            $testimonial->avatar = '/uploads/testimonial/' . $image_new_name;
            $testimonial->save();
        }

        
        Session::flash('success', 'Testimonial Created Successfully');
        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial, $id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.show', ['testimonial' => $testimonial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial, $id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'avatar' => 'required|image|max:2048',
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;

        if($request->hasFile('avatar')){
            $image = $request->avatar;
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/uploads/testimonial/'), $image_new_name);
            $testimonial->avatar = '/uploads/testimonial/' . $image_new_name;
        }
        $testimonial->save();
        
        Session::flash('success', 'Testimonial Updated Successfully');
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial, $id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial){
            if(file_exists(public_path($testimonial->avatar))){
                unlink($testimonial->avatar);
            }
            $testimonial->delete();
        }

        Session::flash('success', 'Testimonial Deleted Successfully');
        return redirect()->route('testimonial.index');
    }
}
