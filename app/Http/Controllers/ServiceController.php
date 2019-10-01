<?php

namespace App\Http\Controllers;

use Session;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'title' => 'required',
            'icon' => 'required|image|max:2048',
            'description' => 'required',
        ]);


        $service = Service::create([
            'title' => $request->title,
            'icon' => 'uploads/service/',
            'description' => $request->description,
        ]);

        if($request->hasFile('icon')){
            $image = $request->icon;
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/service/'), $image_new_name);
            $service->icon = 'uploads/service/' . $image_new_name;
            $service->save();
        }

        Session::flash('success', 'Service Created Successfully');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, $id)
    {
        $service = Service::find($id);
        return view('admin.service.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, $id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required|image|max:2048',
            'description' => 'required',
        ]);

        $service = Service::find($id);
        $service->title = $request->title;
        if($request->hasFile('icon')){
            $image = $request->icon;
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/service/'), $image_new_name);
            $service->icon = 'uploads/service/' . $image_new_name;
        }

        $service->description = $request->description;
        $service->save();

        Session::flash('success', 'Service Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        $service = Service::find($id);
        if($service){
            $service->delete();
        } else {
            return redirect()->back();
        }
        Session::flash('succes', 'Service Deleted Successfully');
        return redirect()->route('service.index');
    }
}
