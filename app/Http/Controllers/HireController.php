<?php

namespace App\Http\Controllers;

use Session;
use App\Hire;
use Illuminate\Http\Request;

class HireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hires = Hire::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.hire.index', ['hires' => $hires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'email' => 'required',
            'budget' => 'required',
            'message' => 'required',
        ]);

        $hire = Hire::create([
            'name' => $request->name,
            'email' => $request->email,
            'budget' => $request->budget,
            'social' => $request->social,
            'message' => $request->message,
        ]);

        Session::flash('success', 'Message Sent Successfully');
        return redirect()->route('index.hire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function show(Hire $hire, $id)
    {
        $hire = Hire::find($id);
        return view('admin.hire.show', ['hire' => $hire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function edit(Hire $hire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hire $hire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hire $hire, $id)
    {
        $hire = Hire::find($id);
        if($hire){
            $hire->forceDelete();
            Session::flash('success', 'Hire Message Deleted Successfully');
        }

        return redirect()->back();
    }

    public function send(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'budget' => 'required',
            'message' => 'required|min:200',
        ]);

        $hire = Hire::create([
            'name' => $request->name,
            'email' => $request->email,
            'budget' => $request->budget,
            'social' => $request->social,
            'message' => $request->message,
        ]);

        return response()->json('Contact Form Send Successfully', 200);
    }
}
