<?php

namespace App\Http\Controllers;

use Session;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $about = About::find(1);

        if($about){
            return view('admin.about.edit')->with('about', $about);
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'greeting' => 'required',
            'banner_title' => 'required',
            'greeting_note' => 'required',
            'description' => 'required',
        ]);

        $about = About::find(1);
        $about->name = $request->name;
        $about->greeting = $request->greeting;
        $about->banner_title = $request->banner_title;
        $about->greeting_note = $request->greeting_note;
        $about->description = $request->description;
        $about->save();

        Session::flash('success', 'About information updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }

    public function get_data(){
        $about = About::find(1);

        return response()->json($about, 200);
    }
}
